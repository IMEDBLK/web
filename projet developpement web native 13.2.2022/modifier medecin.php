<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Modifier Médecin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    <meta charset="utf-8">
    <link rel="shortcut icon"  type="image/x-icon" href="image\md.png">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="styleam.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">administrateur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="ajoutermedecin.php">ajouter medecin</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="#">modifier fiche medecin</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="consulter medecin.php">consulter la liste de medicin</a>
            </li> 
            
          </form>
        </div>
      </div>
    
      <p>
        <a class="btn2" href="login.php">deconnecter</a>
      </p>
    </nav>

 <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">Modifier Médecin</h3><br />
    <form method="post" id="update_form">
                    <div align="left">
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn2" value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <th width="5%"></th>
                                <th width="20%">Nom</th>
                                <th width="30%">Prenom</th>
                                <th width="15%">Date Naissance</th>
                                <th width="20%">Email</th>
                             
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </form>
   </div>  
  </div>
   






  </body>
</html>
<script>  
$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
            url:"select.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" nomu="'+data[count].nomu+'" data-nom="'+data[count].nom+'" data-prenom="'+data[count].prenom+'" data-dateN="'+data[count].dateN+'" data-mail="'+data[count].mail+'"  class="check_box"  /></td>';
                    html += '<td>'+data[count].nom+'</td>';
                    html += '<td>'+data[count].prenom+'</td>';
                    html += '<td>'+data[count].dateN+'</td>';
                    html += '<td>'+data[count].mail+'</td>';
                    
                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {
            html = '<td><input type="checkbox" nomu="'+$(this).attr('nomu')+'" data-nom="'+$(this).data('nom')+'" data-prenom="'+$(this).data('prenom')+'" data-dateN="'+$(this).data('dateN')+'" data-mail="'+$(this).data('mail')+'"  class="check_box" checked /></td>';
            html += '<td><input type="text" name="nom[]" class="form-control" value="'+$(this).data("nom")+'" /></td>';
            html += '<td><input type="text" name="prenom[]" class="form-control" value="'+$(this).data("prenom")+'" /></td>';
            html += '<td><input type="date" name="dateN[]"  class="form-control" value="'+$(this).data("dateN")+'" /></td>';
            html += '<td><input type="text" name="mail[]" class="form-control" value="'+$(this).data("mail")+'" /></td>';
            html += '<td><input type="hidden" name="hidden_nomu[]" value="'+$(this).attr('nomu')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" nomu="'+$(this).attr('nomu')+'" data-nom="'+$(this).data('nom')+'" data-prenom="'+$(this).data('prenom')+'" data-dateN="'+$(this).data('dateN')+'" data-mail="'+$(this).data('mail')+'"  class="check_box" /></td>';
            html += '<td>'+$(this).data('nom')+'</td>';
            html += '<td>'+$(this).data('prenom')+'</td>';
            html += '<td>'+$(this).data('dateN')+'</td>';
            html += '<td>'+$(this).data('mail')+'</td>';
                  
        }
        $(this).closest('tr').html(html);
     
      
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"multiple_update.php",
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Data Updated');
                    fetch_data();
                }
            })
        }
    });

});  
</script>