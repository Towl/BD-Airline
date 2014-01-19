<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
class DefaultFoot implements HtmlPart{	
	public function insert(){
		?><!-- Le javascript ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="ressources/js/jquery.js"></script>
		<script src="ressources/js/bootstrap.min.js"></script>
		<?php
	}
}
?>