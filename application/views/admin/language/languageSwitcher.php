 <?php 
                                          $lang=$this->setting_model->get();
                                            $defoult=$lang[0]['lang_id'];
                                            $session=$this->session->userdata('hospitaladmin');
                                        
                                            $id=$session['id'];
                                           $defoultlang=$this->setting_model->get_stafflang($id);
                                          
                                           if(!empty($defoultlang) ){
                                            if($defoultlang['lang_id']!=0){
                                                $defoult=$defoultlang['lang_id'];
                                            }else{
                                            $defoult=$lang[0]['lang_id'];   
                                            }
                                             
                                            }
                                          $json_languages=json_decode($lang[0]['languages']);

                                                foreach($json_languages as $value){
                                                    $result=$this->db->select('languages.language,`languages`.`country_code`')->from('languages')->where('id',$value)->get()->row_array();
                                                    ?>
                                                    <option data-content='<span class="flag-icon flag-icon-<?php echo $result['country_code'];?> flag-icon-squared flag-style"></span> <?php echo $result['language'];?>' value="<?php echo $value;?>" <?php if($defoult==$value){ echo "Selected";} ?>></option>
                                                    <?php

                                                }
                                            ?>