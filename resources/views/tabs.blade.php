@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 mt-3">
            <div class="col-sm-6">
                <h1>
                    Pestañas de navegación
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">
                            Inicio
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Pestañas de navegación
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- ./row -->
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card card-primary card-primary card-outline">
                            <div class="card-header p-0 pt-1 border-bottom-0 o-fondo-2">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-two-home" aria-selected="true" class="nav-link active" data-toggle="pill" href="#custom-tabs-two-home" id="custom-tabs-two-home-tab" role="tab">
                                            Rubro 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-two-profile" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-two-profile" id="custom-tabs-two-profile-tab" role="tab">
                                            Rubro 2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-two-messages" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-two-messages" id="custom-tabs-two-messages-tab" role="tab">
                                            Rubro 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-two-settings" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-two-settings" id="custom-tabs-two-settings-tab" role="tab">
                                            Rubro 4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div aria-labelledby="custom-tabs-two-home-tab" class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                                    </div>
                                    <div aria-labelledby="custom-tabs-two-profile-tab" class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel">
                                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                    </div>
                                    <div aria-labelledby="custom-tabs-two-messages-tab" class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                    </div>
                                    <div aria-labelledby="custom-tabs-two-settings-tab" class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1 o-fondo-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-one-home" aria-selected="true" class="nav-link active" data-toggle="pill" href="#custom-tabs-one-home" id="custom-tabs-one-home-tab" role="tab">
                                            Rubro 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-one-profile" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-one-profile" id="custom-tabs-one-profile-tab" role="tab">
                                            Rubro 2
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-one-messages" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-one-messages" id="custom-tabs-one-messages-tab" role="tab">
                                            Rubro 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-controls="custom-tabs-one-settings" aria-selected="false" class="nav-link" data-toggle="pill" href="#custom-tabs-one-settings" id="custom-tabs-one-settings-tab" role="tab">
                                            Rubro 4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div aria-labelledby="custom-tabs-one-home-tab" class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                                    </div>
                                    <div aria-labelledby="custom-tabs-one-profile-tab" class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel">
                                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                    </div>
                                    <div aria-labelledby="custom-tabs-one-messages-tab" class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                    </div>
                                    <div aria-labelledby="custom-tabs-one-settings-tab" class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
</section>
@endsection
