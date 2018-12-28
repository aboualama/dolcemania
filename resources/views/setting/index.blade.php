@extends('layouts.backend')

@section('content')

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Setting:</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div> 

             
        <div class="block-content"> 
            <form action="{{route('setting.update')}}" method="POST" role="form">
             {{ csrf_field() }}  
                <div class="form-group form-row">
                    <div class="col-6"> 
                            <label>Product Name:</label>    
                            <input type="text" class="form-control" value="{{  env('TELE') }}" name="tele"> 
                    </div> 
                    <div class="col-6"> 
                            <label>Product Name:</label>    
                            <input type="text" class="form-control" value="{{  env('NAME') }}" name="name"> 
                    </div> 
                </div> 
                <div class="form-group form-row">
                    <div class="col-6"> 
                            <label>Product Name:</label>    
                            <input type="text" class="form-control" value="{{  env('INVO') }}" name="invo"> 
                    </div> 
                    <div class="col-6"> 
                            <label>Product Name:</label>    
                            <input type="text" class="form-control" value="{{  env('TELE') }}" name="tel2e"> 
                    </div> 
                </div> 
                <div class="form-group form-row">
                    <div class="col-6"> 
                            <label>Product Name:</label>    
                            <input type="text" class="form-control" value="{{  env('TELE') }}" name="tel22e"> 
                    </div> 
                    <div class="col-6"> 
                            <label>Product Name:</label>    
                            <input type="text" class="form-control" value="{{  env('TELE') }}" name="tel222e"> 
                    </div> 
                </div> 
                 
 
                  
                 
                <div class="form-group"> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> 

            </form>  
        </div> 
    </div>  
 

 
 
@endsection  
