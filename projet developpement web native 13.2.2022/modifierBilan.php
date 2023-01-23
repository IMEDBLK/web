<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Update</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
          
    <meta charset="utf-8">
    
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="styleam.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Médecin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="ajouterBilan.php">Ajouter Consultation</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="modifierBilan.php">Modifier Consultation</a>
            </li> 
			
			 <li class="nav-item">
              <a class="nav-link " href="supprimerBilan.php">Supprimer Consultation</a>
            </li> 
			
            <li class="nav-item">
              <a class="nav-link" href="consulterBilan.php">Consulter </a>
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
    <h3 align="center">Modifier Bilan</h3><br />
    <form method="post" id="update_form">
                    <div align="left">
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn2" value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <th width="5%"></th>
								<th width="20%">CiN</th>
                                <th width="20%">Taille de patient</th>
								<th width="15%">Poid de poid</th>
								<th width="15%">Témperature</th>
                                <th width="15%">Resultat de l'examen</th>
                                <th width="20%">Groupe sanguin</th>
                                <th width="30%">Diabetique</th>
								<th width="30%">Autre maladie</th>
								<th width="15%">Nombre des rendez-vous passé</th>
								
								
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
            url:"select2.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" cin="'+data[count].cin+'" data-taille="'+data[count].taille+'" data-poid="'+data[count].poid+'" data-temp="'+data[count].temp+'" data-result="'+data[count].result+'" data-sang="'+data[count].sang+'" data-diab="'+data[count].diab+'" data-autre="'+data[count].autre+'" data-rendezvous="'+data[count].rendezvous+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].cin+'</td>';
					html += '<td>'+data[count].taille+'</td>';
                    html += '<td>'+data[count].poid+'</td>';
                    html += '<td>'+data[count].temp+'</td>';
                    html += '<td>'+data[count].result+'</td>';
                    html += '<td>'+data[count].sang+'</td>';
					html += '<td>'+data[count].diab+'</td>';
					html += '<td>'+data[count].autre+'</td>';
					html += '<td>'+data[count].rendezvous+'</td>';
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
            html = '<td><input type="checkbox" cin="'+$(this).attr('cin')+'" data-taille="'+$(this).data('taille')+'" data-poid="'+$(this).data('poid')+'" data-temp="'+$(this).data('temp')+'" data-result="'+$(this).data('result')+'" data-sang="'+$(this).data('sang')+'" data-diab="'+$(this).data('diab')+'" data-autre="'+$(this).data('autre')+'" data-rendezvous="'+$(this).data('rendezvous')+'" class="check_box" checked /></td>';
            html += '<td><input type="text" name="cin[]" class="form-control" value="'+$(this).data("cin")+'" /></td>';
			html += '<td><input type="text" name="taille[]" class="form-control" value="'+$(this).data("taille")+'" /></td>';
            html += '<td><input type="text" name="poid[]" class="form-control" value="'+$(this).data("poid")+'" /></td>';
            html += '<td><input type="text" name="temp[]"  class="form-control" value="'+$(this).data("temp")+'" /></td>';
            html += '<td><input type="text" name="result[]" class="form-control" value="'+$(this).data("result")+'" /></td>';
			html += '<td><input type="text" name="sang[]" class="form-control" value="'+$(this).data("sang")+'" /></td>';
			html += '<td><input type="text" name="diab[]" class="form-control" value="'+$(this).data("diab")+'" /></td>';
			html += '<td><input type="text" name="autre[]" class="form-control" value="'+$(this).data("autre")+'" /></td>';
			html += '<td><input type="text" name="rendezvous[]" class="form-control" value="'+$(this).data("rendezvous")+'" /></td>';
            html += '<td><input type="hidden" name="hidden_cin[]" value="'+$(this).attr('cin')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" cin="'+$(this).attr('cin')+'" data-taille="'+$(this).data('taille')+'" data-poid="'+$(this).data('poid')+'" data-temp="'+$(this).data('temp')+'" data-result="'+$(this).data('result')+'" data-sang="'+$(this).data('sang')+'" data-diab="'+$(this).data('diab')+'" data-autre="'+$(this).data('autre')+'" data-rendezvous="'+$(this).data('rendezvous')+'" class="check_box" /></td>';
            html += '<td>'+$(this).data('cin')+'</td>';
			html += '<td>'+$(this).data('taille')+'</td>';
            html += '<td>'+$(this).data('poid')+'</td>';
            html += '<td>'+$(this).data('temp')+'</td>';
            html += '<td>'+$(this).data('result')+'</td>';
			html += '<td>'+$(this).data('sang')+'</td>';
			html += '<td>'+$(this).data('diab')+'</td>';
			html += '<td>'+$(this).data('autre')+'</td>';
			html += '<td>'+$(this).data('rendezvous')+'</td>';
                  
        }
        $(this).closest('tr').html(html);
     
      
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"multiple_update2.php",
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