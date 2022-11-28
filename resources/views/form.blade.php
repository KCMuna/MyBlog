<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{url('bootstrap/css/style.css')}}">
<title>Apply Form</title>
 
<style>
  .form-control{
  height:35px;

  }
  #lang{
      display: flex;
     align-items: center;
     padding:5px;
     float:left;
     margin-bottom:10px;


  }
  h2{
color:#475052;
  }
  .labelpo{
    margin-bottom:10px;
  }
</style>
</head>
<body>

<form method="post" action="#">
  @csrf
            <h2>Personal Details</h2>
                <div class="form-group">
                    <label for="formGroupExampleInput">Full Name:</label>
                    <input type="text" id="formControlDefault" class="form-control" name="fullname"required><!-- Required for no empty values -->

                    <label for="formGroupExampleInput">Email:</label>
                    <input type="email" id="formControlDefault" class="form-control" name="email"required><!-- Required for no empty values -->

                    <label for="formGroupExampleInput">Position: </label>
                    <div id="formControlDefault" class="labelpo" >
                        <select name="languages" id="lang">
                            <option value="javascript">JavaScript</option>
                            <option value="php">PHP</option>
                            <option value="java">Java</option>
                            <option value="golang">Golang</option>
                            <option value="python">Python</option>
                        </select>
                    </div><br>
                
                    <label for="formGroupExampleInput">Upload Resume:</label>
                    <input type="file" id="formControlDefault" class="form-control" name="resume"required>
                    
                </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                    <button class="btn btn-light" type="back"><a style="text-decoration:none;" href="{{ URL::previous() }}">Go Back</a></button><!-- On click navigate to previous page -->
            
            </form>
  </body>
</html>