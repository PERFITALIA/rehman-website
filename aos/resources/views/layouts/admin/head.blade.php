<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $pageTitle ?? config('app.name', 'Admin') }}</title>
        <link rel="shortcut icon" href="{{'admin_theme/dist/images/fevicon.png'}}" />
        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">



        <!-- START: Template CSS-->
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/simple-line-icons/css/simple-line-icons.css')}}">        
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/flags-icon/css/flag-icon.min.css')}}">         
        <!-- END Template CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet"  href="{{asset('admin_theme/dist/vendors/chartjs/Chart.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/morris/morris.css')}}"> 
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/chartjs/Chart.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/starrr/starrr.css')}}"> 
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/ionicons/css/ionicons.min.css')}}"> 
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css')}}">
        <link rel="stylesheet" href="{{asset('admin_theme/dist/vendors/summernote/summernote-bs4.css')}}" />
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="{{asset('admin_theme/dist/css/main.css')}}">
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->