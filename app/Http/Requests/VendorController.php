<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class VendorController extends Controller
{

    public function VendorLogin()
    {
        return view('vendor.login');
    }

    public function VendorDashboard()
    {
        return view('vendor.index');
    }

    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $vendorData = User::find($id);
        return view('vendor.vendor_profile_view', compact('vendorData'));
    }

    public function VendorChangePassword()
    {
        return view('vendor.vendor_change_password');
    }

    public function VendorProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->adresse = $request->adresse;
        $data->vendor->infos = $request->infos;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notifications = array(
            'message' => 'Vendor Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifications);
    }

    public function VendorUpdatePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        // Match the old password
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => "Old Password doesn't match!"]);
        }

        // Update the new password
        auth()->user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notifications = array(
            'message' => 'Password Updated Successfully',
            'alert-type' => 'success'
        );
        // Flash success message
        return back()->with($notifications);
    }

    public function VendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('vendor.login');
    }
}
