<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php
error_reporting(0);
	// Database connectivity
session_start();
$con=mysqli_connect('localhost','root','','recipes');

// Debug
function _t($data){
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}

// Message Confiuration
function _warning($str){
	echo '<p class="alert alert-warning">'.$str.'</p>';
}

function _success($str){
	echo '<p class="alert alert-success">'.$str.'</p>';
}

function _error($str){
	echo '<p class="alert alert-danger">'.$str.'</p>';
}

// Path Configuration
function get_path(){
	$res=array();
	// $res['siteUrl']='http://localhost/learning/onlinerecipe';
	$res['siteUrl']='http://localhost/recipes';
	return $res;
}
$path=get_path();

// Admin Functionality Start

// Admin Login
function admin_login($data){
	$res=array();
	global $con;
	$username=mysqli_escape_string($con,$data['username']);
	$password= 'admin';
	$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=mysqli_error($con);
	}
	return $res;
}

// Count All Category
function count_category(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM categories");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count All Recipes
function count_category_front(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM categories");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count Searched Recipes
function count_searched_data($queryString){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM recipes WHERE title LIKE '$queryString%'");
	$res=mysqli_fetch_assoc($query);
	return $res;
}


// Add Category
function add_category($data){
	$res=array();
	global $con;
	$title=$data['title'];
	$desc=$data['description'];
	$img=$data['catimage'];
	$query=mysqli_query($con,"INSERT INTO categories (title,description,image) VALUES ('$title','$desc','$img')");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=mysqli_error($con);
	}
	return $res;
}

// Update Category
function update_category($data,$id){
	$res=array();
	global $con;
	$title=$data['title'];
	$desc=$data['description'];
	$img=$data['catimage'];
	$query=mysqli_query($con,"UPDATE categories SET title='$title', description='$desc',image='$img' WHERE category_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=mysqli_error($con);
	}
	return $res;
}

// Get All category
function get_all_category(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM categories");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Get All category for pagination
function get_all_category_front($start,$limit){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM categories ORDER BY category_id DESC LIMIT $start,$limit");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Get All category
function get_category_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM categories WHERE category_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData']=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Delete category
function delete_category($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"DELETE FROM categories WHERE category_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Count All Recipes
function count_recipe(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM recipes");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Count All Recipes By Categories
function count_recipe_by_cat($catid){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM recipes WHERE category_id='$catid'");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Add Recipe
function add_recipe($data){
	$res=array();
	global $con;
	$category=$data['category'];
	$title=$data['title'];
	$sdesc=$data['small_desc'];
	$desc=$data['description'];
	$videourl=$data['videourl'];
	$img=$data['image'];
	$query=mysqli_query($con,"INSERT INTO recipes(category_id,title,small_desc,description,img,video_url) VALUES('$category','$title','$sdesc','$desc','$img','$videourl')");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=mysqli_error($con);
	}
	return $res;
}

// Get All recipes
function get_all_recipe(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM recipes ORDER BY recipe_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Get All recipes
function get_all_recipe_front($start,$limit){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM recipes ORDER BY recipe_id DESC LIMIT $start,$limit");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Update Category
function update_recipe($data,$id){
	$res=array();
	global $con;
	$category=$data['category'];
	$title=$data['title'];
	$small_desc=$data['small_desc'];
	$desc=$data['description'];
	$videourl=$data['videourl'];
	$img=$data['image'];
	$query=mysqli_query($con,"UPDATE recipes SET category_id='$category', title='$title', small_desc='$small_desc',description='$desc',img='$img',video_url='$videourl' WHERE recipe_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=mysqli_error($con);
	}
	return $res;
}

// Get All category
function get_recipe_by_id($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM recipes WHERE recipe_id='$id'");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData']=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Delete category
function delete_recipe($id){
	$res=array();
	global $con;
	$query=mysqli_query($con,"DELETE FROM recipes WHERE recipe_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Count All Recipes
function count_opinion(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT COUNT(*) as total FROM opinions");
	$res=mysqli_fetch_assoc($query);
	return $res;
}

// Get all opinions
function get_all_opinions(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM opinions ORDER BY opinion_id DESC");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Admin Functionality End

// FrontEnd Functionality Start

// Get Specific Recipe Views
function get_views($id){
	global $con;
	$query=mysqli_query($con,"SELECT views FROM recipes WHERE recipe_id='$id'");
	$views=mysqli_fetch_assoc($query);
	return $views;
}

// Update Views
function update_views($id,$views){
	$res=array();
	global $con;
	$views=$views+1;
	$query=mysqli_query($con,"UPDATE recipes SET views=$views WHERE recipe_id='$id'");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Search Data
function search_data($str,$start,$limit){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM recipes WHERE title LIKE '$str%' LIMIT $start,$limit");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Get All Recipes By Category ID
function get_all_recipe_by_cat($catid,$start,$limit){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM recipes WHERE category_id='$catid' ORDER BY recipe_id DESC LIMIT $start,$limit");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Get Latest 5 Recipes
function get_latest5_recipes(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT recipe_id,title FROM recipes ORDER BY recipe_id DESC LIMIT 10");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Get popular Recipes
function get_popular_recipes(){
	$res=array();
	global $con;
	$query=mysqli_query($con,"SELECT * FROM recipes ORDER BY views DESC LIMIT 10");
	if(mysqli_num_rows($query)>0){
		$res['bool']=true;
		while($data=mysqli_fetch_assoc($query)){
			$res['allData'][]=$data;
		}
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Add Comment
function add_comment($id,$data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO comments (recipe_id,name,email,comment_msg) VALUES ('".$id."','".$data['name']."','".$data['email']."','".$data['desc']."')");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// Submit Opinion
function add_opinion($data){
	$res=array();
	global $con;
	$query=mysqli_query($con,"INSERT INTO opinions (name,email,phone,message) VALUES ('".$data['name']."','".$data['email']."','".$data['phone']."','".$data['msg']."')");
	if(mysqli_affected_rows($con)>0){
		$res['bool']=true;
	}else{
		$res['bool']=false;
	}
	return $res;
}

// FrontEnd Functionality End

?>