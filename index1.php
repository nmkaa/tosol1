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
      <div class="">
        <!-- <h1>Simple Bootgrid example with add,edit and delete using PHP,MySQL and AJAX</h1> -->
        <div class="col-sm-8">
		<div class="well clearfix">
			<div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> нэмэх</button></div></div>
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th data-column-id="id" data-type="numeric" data-identifier="true">№</th>
					<th data-column-id="olgoltname">Олголт нэр</th>
					<th data-column-id="orgodol">Өргөдөл</th>
					<th data-column-id="todor">Тодорхойлолт</th>
					<th data-column-id="unemleh">Үнэмлэхний хуулбар</th>
					<th data-column-id="embicheg">Эмчийн бичиг</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Засах</th>
				</tr>
			</thead>
		</table>
    </div>
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
                    <label for="name" class="control-label">Олголт нэр:</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                  </div>
                  <div class="form-group">
                    <label for="orgodol" class="control-label">Өргөдөл:</label>
                    <input type="text" class="form-control" id="orgodol" name="orgodol"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Тодорхойлолт:</label>
                    <input type="text" class="form-control" id="todor" name="todor"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Үнэмлэхний хуулбар:</label>
                    <input type="text" class="form-control" id="unemleh" name="unemleh"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Эмчийн бичиг:</label>
                    <input type="text" class="form-control" id="embicheg" name="embicheg"/>
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
                <h4 class="modal-title">Хэрэглэгч засах</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="name" class="control-label">Барааны нэр:</label>
                    <input type="text" class="form-control" id="edit_name" name="edit_name"/>
                  </div>
                  <div class="form-group">
                    <label for="orgodol" class="control-label">Барааны код:</label>
                    <input type="text" class="form-control" id="edit_orgodol" name="edit_orgodol"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Тоо, Ширхэг:</label>
                    <input type="text" class="form-control" id="edit_todor" name="edit_todor"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Хэрэглэгчийн код:</label>
                    <input type="text" class="form-control" id="edit_unemleh" name="edit_unemleh"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Үнэ:</label>
                    <input type="text" class="form-control" id="edit_embicheg" name="edit_embicheg"/>
                  </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Буцах</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Хадаглах</button>
            </div>
			</form>
        </div>
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
		
		url: "response1.php",
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
                                $('#edit_name').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_orgodol').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_todor').val(ele.siblings(':nth-of-type(4)').html());
                                $('#edit_unemleh').val(ele.siblings(':nth-of-type(5)').html());
                                $('#edit_embicheg').val(ele.siblings(':nth-of-type(6)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {
	
		var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
					alert(conf);
                    if(conf){
                                $.post('response1.php', { id: $(this).data("row-id"), action:'delete'}
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
				  url: "response1.php",  
				  data: data,
				  dataType: "json",       
				  success: function(response1)  
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
