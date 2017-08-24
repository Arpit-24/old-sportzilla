<?php 

require('core/init.php');
$user=new User;
$template=new Template("templates/login.php");
$db=new Database;
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
//include_once "templates/base.php";




/************************************************
  ATTENTION: Fill in these values! Make sure
  the redirect URI is to this page, e.g:
  http://localhost:8080/user-example.php
 ************************************************/
$client_id = '847065029780-f5lgetbf18jt2ge12u5l93bak16nhap9.apps.googleusercontent.com';
$client_secret = 'g-V61PcI6MBi4VOVsXc93aDi';
$redirect_uri = 'http://localhost/new_odyssey/login.php';

try 
{require_once realpath(dirname(__FILE__) . '/libraries/src/Google/autoload.php');

  $client = new Google_Client();

$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setScopes('email');
}catch(Exception $e)
{
  session_destroy();
}
/************************************************
  If we're logging out we just need to clear our
  local access token in this case
 ************************************************/
if (isset($_REQUEST['logout'])) {
  session_destroy();
}

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 ************************************************/
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
 $template->authUrl = $client->createAuthUrl();
 $authUrl = $client->createAuthUrl();
}

/************************************************
  If we're signed in we can go ahead and retrieve
  the ID token, which is part of the bundle of
  data that is exchange in the authenticate step
  - we only need to do a network call if we have
  to retrieve the Google certificate to verify it,
  and that can be cached.
 ************************************************/
if ($client->getAccessToken()) {
  $_SESSION['access_token'] = $client->getAccessToken();
  $token_data = $client->verifyIdToken()->getAttributes();
}


if (strpos($client_id, "googleusercontent") == false) {
  echo missingClientSecretsWarning();
  exit;
}
?>
<div class="box">
  <div class="request">
<?php
if (isset($authUrl)) {
  //echo "<a class='login' href='" . $authUrl . "'>Connect Me!</a>";
} else {
	
	$db->query("SELECT * FROM users WHERE email_id=:email");
	$db->bind("email",$token_data['payload']['email']);
	$result=$db->single();
  //print_r($result);
	if(!empty($result))
	{
	echo  $_SESSION['email']=$token_data['payload']['email'];
   $_SESSION['id']=$result->id;
 echo $_SESSION['question']=$result->question+1;
 	header("Location:index.php");
		
	}
	else {$name="";
$db->query("INSERT INTO users (email_id,name,score,question) VALUES (:email,:name,'0','0')");
$db->bind("email",$token_data['payload']['email']);
$db->bind("name",$token_data['payload']['name']);
$db->execute();
$db->query("SELECT * FROM users WHERE email_id=:email");
$db->bind("email",$token_data['payload']['email']);
$user=$db->single();
    $_SESSION['id']=$user->id;
  $_SESSION['question']=1;
header('Location:index.php');}
}
?>
  </div>

  <!-- <div class="data">
<?php 
//if (isset($token_data)) {
  //var_dump($token_data);
//}
?>
  </div>
</div>
 -->
<?php

echo  $template;
if(!empty($_REQUEST["error"])):
?>

<script>
        
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.error('<?php echo $_REQUEST["error"];?>','Login Error' );

            }, 1300);
</script>
<?php endif;?>