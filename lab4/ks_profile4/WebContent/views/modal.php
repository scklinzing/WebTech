<?php
/**
 * This is the code for the gallery modal.
 */
function modal() {
?>
<style>
ul {
	padding: 0 0 0 0;
	margin: 0 0 0 0;
}

ul li {
	list-style: none;
	padding: 0 0 0 0;
	margin: 0 0 0 0;
}

ul li img {
	cursor: pointer;
	width: 100px;
	height: 100px;
	overflow: hidden;
}

.modal-body {
	padding: 5px !important;
}

.modal-content {
	border-radius: 0;
}

.modal-dialog img {
	text-align: center;
	margin: 0 auto;
}

.controls {
	width: 50px;
	display: block;
	font-size: 11px;
	padding-top: 8px;
	font-weight: bold;
}

.next {
	float: right;
	text-align: right;
}
/*override modal for demo only*/
.modal-dialog {
	max-width: 500px;
	padding-top: 90px;
}

@media screen and (min-width: 768px) {
	.modal-dialog {
		width: 500px;
		padding-top: 90px;
	}
}

table, th, td {
	border: 1px solid black;
}

footer {
	text-align: center;
}
</style>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body"></div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
	$(document).ready(function(){        
        $('li img').on('click',function(){
            var src = $(this).attr('src');
            var img = '<img src="' + src + '" class="img-responsive"/>';
            //start of new code new code
            var index = $(this).parent('li').index();   
            var html = '';
            html += img;                
            html += '<div style="height:25px;clear:both;display:block;">';
            html += '<a class="controls next" href="'+ (index+2) + '">next &raquo;</a>';
            html += '<a class="controls previous" href="' + (index) + '">&laquo; prev</a>';
            html += '</div>';
            $('#myModal').modal();
            $('#myModal').on('shown.bs.modal', function(){
                $('#myModal .modal-body').html(html);
                //new code
                $('a.controls').trigger('click');
            })
            $('#myModal').on('hidden.bs.modal', function(){
                $('#myModal .modal-body').html('');
            });
       });
    })
    $(document).on('click', 'a.controls', function(){
        var index = $(this).attr('href');
        var src = $('ul.row li:nth-child('+ index +') img').attr('src');             
        $('.modal-body img').attr('src', src);
        var newPrevIndex = parseInt(index) - 1; 
        var newNextIndex = parseInt(newPrevIndex) + 2; 
        if($(this).hasClass('previous')){               
            $(this).attr('href', newPrevIndex); 
            $('a.next').attr('href', newNextIndex);
        }else{
            $(this).attr('href', newNextIndex); 
            $('a.previous').attr('href', newPrevIndex);
        }
        var total = $('ul.row li').length + 1; 
        //hide next button
        if(total === newNextIndex){
            $('a.next').hide();
        }else{
            $('a.next').show()
        }            
        //hide previous button
        if(newPrevIndex === 0){
            $('a.previous').hide();
        }else{
            $('a.previous').show()
        }
        return false;
    });
    </script>
<?php }?>