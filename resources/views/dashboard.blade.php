@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 mb-2 animated fadeInDown">             
             <h1 class="jumbotron-heading text-light">
             <span class="float-right">
                <a href="/listings/create" class="btn btn-dark btn-xs">
                 <i class="fas fa-plus mr-2"></i>
                  CONTACT
                </a>
             </span>
        </h1>  
    </div>
    <div class="col-md-8 animated fadeInUp">      
        <div class="card">
          <div class="display-4 card-header">
             CONTACTS
           </div>
           <div class="card-body">
            @if(count($listings)>0)
              <table class="table table-striped">
                <tr>
                  <th>Company</th>
                  <th>
                    <div class="float-right mr-2">
                       Edit / Delete
                    </div>
                  </th>
                </tr>
                @foreach($listings as $listing)
                  <tr>
                    <td>               
                        <h3>
                           <i class="far fa-address-card fa-1x mr-2"></i>  
                           <a href="/listings/{{$listing->id}}"> {{$listing->name}} </a>        
                        </h3>            
                    </td>
                    <td>
                       <div class="float-right">
                          <a href="/listings/{{$listing->id}}/edit" class="btn btn-warning mr-1">
                             <i class="fas fa-pencil-alt fa-lg"></i>
                          </a>
                          <!--
                          <a href="#" class="btn btn-danger mr-1">
                             <i class="fas fa-trash fa-lg"></i>
                          </a>   
                          -->
                          
{!!Form::open(['action' => ['ListingsController@destroy', $listing->id],'method' => 'POST','class' => 'float-right', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::button('<i class="fas fa-trash fa-lg"></i>', ['type' => 'submit','class' => 'btn btn-danger mr-1 float-right'])}}
{!! Form::close() !!}            
                                    
                       </div>
                    </td>
                  </tr>
                @endforeach
              </table>
            @endif
            @if(count($listings)==0)
            <span>You have not created any contacts yet.</span>
            @endif
           </div>
        </div>
    </div>
</div>
@endsection
