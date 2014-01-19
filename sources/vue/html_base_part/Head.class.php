<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/html_base_part/HtmlPart.interface.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/sources/vue/LineManager.class.php');
class Head implements HtmlPart{
	private $metaSpecials = array();
	private $metas = array();
	private $links = array();
	private $scripts = array();
	private $specials = array();
	private $nbSpecial = 0;
	private $nbMetaSpecial = 0;
	private $title = 'Sans titre !';
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function addMeta($name,$content){
		$this->metas[$name] = $content;
	}
	
	public function addLink($href,$rel){
		$this->links[$href] = $rel;
	}
	
	public function addScript($src,$type){
		$this->scripts[$src] = $type;
	}
	
	public function addSpecial($tag){
		$this->nbSpecial = $this->nbSpecial + 1;
		$this->specials[$this->nbSpecial] = $tag;
	}
	
	public function addMetaSpecial($tag){
		$this->nbMetaSpecial = $this->nbMetaSpecial + 1;
		$this->metaSpecials[$this->nbMetaSpecial] = $tag;
	}
	
	public function insert(){
		echo "<head>";
		LineManager::carriageReturnMore();
		$this->insertListOfTags($this->metaSpecials);
		$this->insertListOfTagsWith2Attr($this->metas,'meta','name','content',true);
		$this->insertListOfTagsWith2Attr($this->links,'link','href','rel',true);
		$this->insertListOfTagsWith2Attr($this->scripts,'script','src','type',false);
		$this->insertListOfTags($this->specials);
		echo "<title>".$this->title."</title>";
		LineManager::carriageReturnLess();
		echo "</head>";
		LineManager::carriageReturnEqual();
	}
	
	private function insertListOfTagsWith2Attr($list, $tagName, $attr1, $attr2,$emptyableTag){
		foreach($list as $value1 => $value2){
			$this->echoTagWith2Attr($tagName,$attr1,$value1,$attr2,$value2,$emptyableTag);
			LineManager::carriageReturnEqual();
		}
	}
	
	private function echoTagWith2Attr($tagName, $attr1, $value1, $attr2, $value2,$emptyableTag){
		echo '<'.$tagName.' '.$attr1.'="'.$value1.'" '.$attr2.'="'.$value2.'"';
		if($emptyableTag){echo '/>';}
		else {echo '></'.$tagName.'>';}
	}
	
	private function insertListOfTags($list){
		foreach($list as $tag){
			echo $tag;
			LineManager::carriageReturnEqual();
		}
	}
}
?>