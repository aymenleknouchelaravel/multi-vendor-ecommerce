@extends('frontend.master_dashboard')

@section('title', 'Home')

<style>
    body {
        display: none;
    }
</style>

@section('body')
      

        <!--Start hero slider-->
        @include('frontend.body.hero')
        <!--End hero slider-->

        <!--Start category slider-->
        @include('frontend.body.category')
        <!--End category slider-->

        <!--Start banners-->
        @include('frontend.body.banners')
        <!--End banners-->

        <!--Start Products Tabs-->
        @include('frontend.body.products')
        <!--End Products Tabs-->

        <!--Start Best Sales-->
        @include('frontend.body.bestsales')
        <!--End Best Sales-->

        {{-- Start Categories --}}
        @include('frontend.body.categories')
        {{-- End Categories --}}

        <!--Start 4 columns-->
        @include('frontend.body.columns')
        <!--End 4 columns-->

        <!--Vendor List -->
        @include('frontend.body.vendor')
        <!--End Vendor List -->


        <script>
            window.addEventListener('load', () => {
                document.body.style.display = 'block'; // Show the body content when everything is loaded
                function delayCompilation() {
                    setTimeout(() => {
                        console.log('Resuming execution after 4 seconds');
                    }, 4000);
                }
                delayCompilation();
            });
        </script>

@endsection