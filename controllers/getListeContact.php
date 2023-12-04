<?php
include '../configuration/configuration.php';
include '../models/contact.php';


function getListeContacts(){
    return Contact::getContacts();
}

// function getContactId(){
//     return Contact::getContactIdByInfo();
// }
// function getContactById($id){
//     return Contact::getContactById($id);
// }
?>
?>
