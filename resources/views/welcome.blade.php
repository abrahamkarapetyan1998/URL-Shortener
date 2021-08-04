<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>
        {{-- Scripts --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            #url_short_ ,#urlHelp, #submitBtn, #err {
                margin-left: 36%;
                width: 30%;
            }    
            #err {
               display: none;
            }
        </style>
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <h1 class="text-center mt-3">Hello World</h1>
        
      
         <div class="text-center alert alert-danger mt-3"  id="err"></div>
         
        <form id="urlSubmit">
            {!! csrf_field() !!}
            <div class="form-group mt-5 d-flex flex-column justify-content-center">
              <label for="url_short" class="text-center">URL address</label>
              <input type="url" name="url_short" class="form-control  mt-3" id="url_short_" aria-describedby="urlHelp" placeholder="Enter URL" required>
              <small id="urlHelp" class="form-text text-muted">We'll never share your URL with anyone else.</small>
            </div>
            <button type="submit" class="btn btn-primary mt-3" id="submitBtn">Submit</button>
           
          </form>
          <div class="text-center mt-5">
            <h5>You Can See Your Shortened  Link Here</h5>
            <a id="result" href="" target="blank"></a>
          </div>
            
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <script>
            
    $( '#urlSubmit' ).on( 'submit', function(e) {
        e.preventDefault();
        let url = $("input[name=url_short]").val();
        let res = $('#result');
        let err = $('#err');
               $.ajax({
                  type:'POST',
                  url:'{{url('/url_short')}}',
                  data:{ 
                         _token:'{{ csrf_token() }}',
                        url:url,
                        },
                
                 dataType: 'json',
             success:function(response){
                    
                res.attr('href', url);
                 href = url;
                 res.text(response.msg);
                },error:function(data){ 
                var errors = data.responseJSON;
                err.css('display', 'block')
                 err.text(errors.errors)
                }
               });
            
    });
        
          
         </script>
    </body>
</html>         