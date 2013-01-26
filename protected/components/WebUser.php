<?php

class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getName(){
    if($user = $this->loadUser($this->id)){
        return $user->name;
    }
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function isAdmin(){
    if($user = $this->loadUser($this->id)){
        return $user->role == 'administrator';
    }
  }
  
  function checkRole($role)
  {
        $user = $this->loadUser(Yii::app()->user->id);
        if(!$user)
            return false;
        return $user->role == $role;
  }
 
  // Load user model.
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=Users::model()->findByPk($id);
        }
        return $this->_model;
    }
    
    function getRole() {
        if($user = $this->loadUser($this->id)){
            // в таблице User есть поле role
            return $user->role;
        }
    }
}
?>
