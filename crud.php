<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <title>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</title> -->
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="dist/jquery.bootgrid.min.js"></script>
</head>
<body>
<div id="main">
      <div id="content" class="left">
	<div class="container">
      <!-- <div class=""> -->
        <div class="col-sm-10">
		<div class="well clearfix">
			<div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> нэмэх</button></div></div>
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th data-column-id="id" data-type="numeric" data-identifier="true">№</th>
          <th data-column-id="bagname">Баг</th>
					<th data-column-id="firstname">Овог</th>
					<th data-column-id="lastname">Нэр</th>
					<th data-column-id="rd">РД</th>
					<th data-column-id="olgoltname">Олголт</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Засах</th>
				</tr>
			</thead>
		</table>
    <!-- </div> -->
  </div>
	</div>
</div>

      <div class="projects">
          <div class="item"></div>
          <div class="item">
            <div class="cl">&nbsp;</div>
          </div>
        </div>
      </div>
      <?php
        include("sidebar.php");
      ?>
    <div class="cl">&nbsp;</div>    </div>
    <div class="shadow-l"></div>
    <div class="shadow-r"></div>
    <div class="shadow-b"></div>
    <?php 
      include("footer.php");
    ?> 
  </div>
</div>
<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Иргэн нэмэх</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="firstname" class="control-label">Овог:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"/>
                  </div>
                  <div class="form-group">
                    <label for="lastname" class="control-label">Нэр:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"/>
                  </div>
				  <div class="form-group">
                    <label for="RD" class="control-label">РД:</label>
                    <input type="text" class="form-control" id="rd" name="rd"/>
                  </div>
                  <div class="form-group">
                    <label for="bagname" class="control-label">Баг:</label>
                    <select type="text" class="form-control" id="bagname" name="bagname">
                      <option value="1-р баг">1-р баг</option>
                      <option value="2-р баг">2-р баг</option>
                      <option value="3-р баг">3-р баг</option>
                      <option value="4-р баг">4-р баг</option>
                      <option value="5-р баг">5-р баг</option>
                      <option value="6-р баг">6-р баг</option>
                      <option value="7-р баг">7-р баг</option>
                      <option value="8-р баг">8-р баг</option>
                      <option value="9-р баг">9-р баг</option>
                      <option value="10-р баг">10-р баг</option>
                      <option value="11-р баг">11-р баг</option>
                      <option value="12-р баг">12-р баг</option>
                      <option value="13-р баг">13-р баг</option>
                      <option value="14-р баг">14-р баг</option>
                      <option value="15-р баг">15-р баг</option>
                      <option value="16-р баг">16-р баг</option>
                      <option value="Өргөө">Өргөө</option>
                      <option value="Малчин">Малчин</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="bagname" name="bagname"/> -->
                  </div>
                <div class="form-group">
                    <label for="olgoltname" class="control-label">Олголтын нэр</label>
                    <select type="text" class="form-control" id="olgoltname" name="olgoltname">
                      <option>Тэжээгч нь нас барсны 18 хүртлэх насны хүүхэдийн тэтгэмж</option>
                      <option>Хөгжлийн бэрхшээлтэй иргэний тэтгэмж</option>
                      <option>Жирэмсэн эх</option>
                      <option>Бүтэн өнчин хүүхдийн тэтгэмж</option>
                      <option>Цалинтай ээж</option>
                      <option>"3 болон түүнээс дээш хүүхэдтэй өрх толгойлсон эх, эцэгт олгох тэтгэмж"</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="olgoltname" name="olgoltname"/> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Буцах</button>
                <button type="button" id="btn_add" class="btn btn-primary">Хадаглах</button>
            </div>
			</form>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Иргэний бүртгэл засах</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="firstname" class="control-label">Овог:</label>
                    <input type="text" class="form-control" id="edit_firstname  " name="edit_firstname"/>
                  </div>
                  <div class="form-group">
                    <label for="lastname" class="control-label">Нэр:</label>
                    <input type="text" class="form-control" id="edit_lastname" name="edit_lastname"/>
                  </div>
				  <div class="form-group">
                    <label for="rd" class="control-label">РД:</label>
                    <input type="text" class="form-control" id="edit_rd" name="edit_rd"/>
                  </div>
                  <div class="form-group">
                    <label for="bagname" class="control-label">Баг:</label>
                    <!-- <input type="text" class="form-control" id="edit_bagname" name="edit_bagname"/> -->
                    <select type="text" class="form-control" id="edit_bagname" name="edit_bagname">
                      <option value="1-р баг">1-р баг</option>
                      <option value="2-р баг">2-р баг</option>
                      <option value="3-р баг">3-р баг</option>
                      <option value="4-р баг">4-р баг</option>
                      <option value="5-р баг">5-р баг</option>
                      <option value="6-р баг">6-р баг</option>
                      <option value="7-р баг">7-р баг</option>
                      <option value="8-р баг">8-р баг</option>
                      <option value="9-р баг">9-р баг</option>
                      <option value="10-р баг">10-р баг</option>
                      <option value="11-р баг">11-р баг</option>
                      <option value="12-р баг">12-р баг</option>
                      <option value="13-р баг">13-р баг</option>
                      <option value="14-р баг">14-р баг</option>
                      <option value="15-р баг">15-р баг</option>
                      <option value="16-р баг">16-р баг</option>
                      <option value="Өргөө">Өргөө</option>
                      <option value="Малчин">Малчин</option>
                    </select>
                  </div>
				        <div class="form-group">
                    <label for="olgoltname" class="control-label">Олголтын нэр:</label>
                    <!-- <input type="text" class="form-control" id="edit_olgoltname" name="edit_olgoltname"/> -->
                    <select type="text" class="form-control" id="edit_olgoltname" name="edit_olgoltname">
                      <option>Тэжээгч нь нас барсны 18 хүртлэх насны хүүхэдийн тэтгэмж</option>
                      <option>Хөгжлийн бэрхшээлтэй иргэний тэтгэмж</option>
                      <option>Жирэмсэн эх</option>
                      <option>Бүтэн өнчин хүүхдийн тэтгэмж</option>
                      <option>Цалинтай ээж</option>
                      <option>"3 болон түүнээс дээш хүүхэдтэй өрх толгойлсон эх, эцэгт олгох тэтгэмж"</option>
                    </select>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Буцах</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Хадаглах</button>
            </div>
			</form>
        </div>
      </div>


</body>
</html>
<script type="text/javascript">
$( document ).ready(function() {
	var grid = $("#employee_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
			};
		},
		
		url: "response.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " + 
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_id);
                    console.log(g_name);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {
							
                                // collect the data
                                $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#edit_firstname').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_lastname').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_rd').val(ele.siblings(':nth-of-type(4)').html());
                                $('#edit_bagname').val(ele.siblings(':nth-of-type(5)').html());
                                $('#edit_olgoltname').val(ele.siblings(':nth-of-type(6)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('response.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback), 
										$("#employee_grid").bootgrid('reload');
                                }); 
								//$(this).parent('tr').remove();
								//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				$.ajax({
				  type: "POST",  
				  url: "response.php",  
				  data: data,
				  dataType: "json",       
				  success: function(response)  
				  {
					$('#'+action+'_model').modal('hide');
					$("#employee_grid").bootgrid('reload');
				  }   
				});
			}
			
			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			$( "#btn_add" ).click(function() {
			  ajaxAction('add');
			});
			$( "#btn_edit" ).click(function() {
			  ajaxAction('edit');
			});
});
</script>
