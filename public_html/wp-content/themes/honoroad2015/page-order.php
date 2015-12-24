<?php
/**
 * 
 * Author: KhangLe
 * Template Name: Product - Order
 * 
 */
get_header();
?>

<?php
global $current_user;
get_currentuserinfo();

$user_id = $current_user->ID;
?>

<div class="container margin-top-xl margin-bottom-xl">
    <!--<form class="form-horizontal" method="post" id="adduser" action="">-->
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <input class="form-control" name="user_fullname" type="text" id="user_fullname" placeholder="Fullname" value="<?php echo esc_attr(get_the_author_meta('user_fullname', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <input class="form-control" name="user_phonenumber" type="text" id="user_phonenumber"  placeholder="Phonenumber" value="<?php echo esc_attr(get_the_author_meta('user_phonenumber', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <input class="form-control" name="user_address" type="text" id="user_address"  placeholder="Address" value="<?php echo esc_attr(get_the_author_meta('user_address', $current_user->ID)) ?>">
            </div>

            <div class="form-group">
                <textarea class="form-control vert"  placeholder="Comment"></textarea>
            </div>

            <?php
            // action hook for plugin and extra fields
            do_action('edit_user_profile', $current_user);
            ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button name="order" id="updateuser" type="submit" class="btn btn-success">Order</button>
                    <input name="action" type="hidden" id="action" value="client-order" />
                </div>
            </div>
        </div>

        <div class="col-md-8">
            
            
            <pre>
First you need to create a controller.

https://docs.angularjs.org/api/ng/directive/ngController

Than you need to create a method in your controller that pushing your item and amount to an array. Assign that function to your button click via:

https://docs.angularjs.org/api/ng/directive/ngClick

In your html you need to loop your array in order to add your record to table.

https://docs.angularjs.org/api/ng/directive/ngRepeat

There is many things needs to be done for what you are asking. Please check the docs, if you don't understand or face with an error of yourse you can ask again.
            </pre>



            <div id="ctrl-as-exmpl" ng-controller="SettingsController1 as settings">
                <label>Name: <input type="text" ng-model="settings.name"/></label>
                <button ng-click="settings.greet()">greet</button><br/>
                Contact:
                <ul>
                    <li ng-repeat="contact in settings.contacts">
                        <select ng-model="contact.type" aria-label="Contact method" id="select_{{$index}}">
                            <option>phone</option>
                            <option>email</option>
                        </select>
                        <input type="text" ng-model="contact.value" aria-labelledby="select_{{$index}}" />
                        <button ng-click="settings.clearContact(contact)">clear</button>
                        <button ng-click="settings.removeContact(contact)" aria-label="Remove">X</button>
                    </li>
                    <li><button ng-click="settings.addContact()">add</button></li>
                </ul>
            </div>


        </div>

    </div>
    <!--</form>-->
</div>

<?php get_footer(); ?>

<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-resource.min.js"></script>
<script>
    angular.module('controllerAsExample', []).controller('SettingsController1', SettingsController1);
    function SettingsController1() {
    this.name = "John Smith";
            this.contacts = [
            {type: 'phone', value: '408 555 1212'},
            {type: 'email', value: 'john.smith@example.org'} ];
    }

    SettingsController1.prototype.greet = function() {
        alert(this.name);
    };
    SettingsController1.prototype.addContact = function() {
        this.contacts.push({type: 'email', value: 'yourname@example.org'});
    };
    SettingsController1.prototype.removeContact = function(contactToRemove) {
        var index = this.contacts.indexOf(contactToRemove);
        this.contacts.splice(index, 1);
    };
    SettingsController1.prototype.clearContact = function(contact) {
        contact.type = 'phone';
        contact.value = '';
    };


</script>