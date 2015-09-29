<?php echo validation_errors(); ?>

<?php echo form_open('login/registration') ?>
    <h1>Registration form</h1>
<?php echo form_label('Name :'); ?>
<?php echo form_input(array('id' => 'name', 'name' => 'name')); ?>
<?php echo form_label('Email :'); ?>
<?php echo form_input(array('id' => 'email', 'name' => 'email')); ?>
<?php echo form_label('Phone :'); ?>
<?php echo form_input(array('id' => 'mobile', 'name' => 'mobile')); ?>
<?php echo form_label('Address :'); ?>
<?php echo form_input(array('id' => 'address', 'name' => 'address')); ?>
<?php echo form_label('Gender :'); ?>
<?php echo form_input(array('id' => 'gender', 'name' => 'gender')); ?>
<?php echo form_submit(array('id' => 'submit', 'value' => 'Register')); ?>
<?php echo form_close(); ?>
</div>