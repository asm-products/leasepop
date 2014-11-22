<?php 
class UsersTableSeeder extends Seeder {

  public function run()
  {
    $user = new User;
    $user->username = 'johndoe';
    $user->email = 'johndoe@site.dev';
    $user->password = 'foo_bar_1234';
    $user->password_confirmation = 'foo_bar_1234';
    $user->confirmation_code = md5(uniqid(mt_rand(), true));
    $user->confirmed = true;

    if(! $user->save()) {
      echo "Done";
      Log::info('Unable to create user '.$user->username, (array)$user->errors());
    } else {
      Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
    }
  }
}
?>