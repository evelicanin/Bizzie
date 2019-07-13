@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 mb-2 animated fadeInDown">             
             <h1 class="jumbotron-heading text-light">
             <span class="float-right">
                <a href="/dashboard" class="btn btn-dark btn-xs">
                 <i class="fas fa-angle-left mr-2"></i>
                  GO BACK
                </a>
             </span>
        </h1>  
    </div> 
    <div class="col-md-8 animated fadeInUp">
        <div class="card">
            <div class="display-4 card-header">
             ADD A CONTACT
           </div>

            <div class="card-body">
              {!!Form::open(['action' => 'ListingsController@store','method' => 'POST'])!!}
                {{Form::bsText('name','',['placeholder' => 'Company Name'])}}
                {{Form::bsText('website','',['placeholder' => 'Company Website'])}}
                {{Form::bsText('email','',['placeholder' => 'Contact Email'])}}
                {{Form::bsText('phone','',['placeholder' => 'Contact Phone'])}}
                {{Form::bsText('address','',['placeholder' => 'Business Address'])}}
                {{Form::bsTextArea('bio','',['placeholder' => 'About This Business'])}}
                {{Form::bsSubmit('CREATE',['class' => 'lead btn btn-primary btn-block'])}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection