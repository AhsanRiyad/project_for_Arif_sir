<?php 
$pageName = 'reg_req';
$APP_ROOT = "$_SERVER[DOCUMENT_ROOT]/project_for_Arif_sir/";
include $APP_ROOT."assets\linker\linkerCss.php" ; 
?>
<?php 
include $dashboard_head;
?>





<p id="user_id" hidden >{{ $userinfo[0]['u_id'] }}</p>


<div class="col-lg-8 col-7 offset-1">
  


<div class="row top-margin text-center bg-info">
  

<div class="col">
  

  <h2 class="  text-white py-2 ">Shipment Request</h2>
</div>
</div>
 
<div class="row">
  


  <table class="table">
    <thead  class="thead-dark">
      <tr>
        <th>id</th>
        <th>Req Date</th>
        <th>Req From</th>
        <th>Details</th>
        <th>Accept</th>
        <th>Reject</th>

      </tr>
    </thead>
    <tbody id="tbody">

  
      <tr>
        <td>{{ $reqs->id }}</td>
        <td>{{ $reqs->req_date }}</td>
        <td>{{ $reqs->last_name }}</td>
        
        <td><button onclick="ship_details('{{ $reqs->id }}')" class="btn btn-success" >Details</button></td>
        <td><button onclick="ship_accept('{{ $reqs->id }}')" class="btn btn-success" >Accept</button></td>
        <td><button onclick="ship_reject('{{ $reqs->id }}')" class="btn btn-danger" >Reject</button></td>
      </tr>



    </tbody>
    
  </table>


</div>
</div>

<div id="dialog" title="Shipment Dtails">
</div>






<?php 
include $dashboard_foot ;
?>
<?php 
include $APP_ROOT."assets/linker/linkerJs.php" ; 
?>