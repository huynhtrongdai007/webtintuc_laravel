<?php 

namespace App\Components;

class Recusive 
{

  private $data;
  private $htmlselect = '';
  function __construct($data)
  {
    $this->data = $data;
  }

   public function categoryRecusive($parent_id,$id = 0,$text='') {
         foreach ($this->data as $value) {
           if ($value->parent_id == $id) {
              if (!empty($parent_id) && $parent_id == $value->id) {
                  $this->htmlselect .= "<option selected value='".$value->id."'>".$text.$value->Ten."</option>";
              } else {
                 $this->htmlselect .= "<option  value='".$value->id."'>".$text.$value->Ten."</option>";
              }
              $this->categoryRecusive($parent_id,$value->id,$text.'--');
           }
         }

         return $this->htmlselect;
    }
}


