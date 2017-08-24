<?php 
class Products{

public function getProducts()
{
	$db=new Database;	
	$db->query("SELECT tbl_products.*,tbl_subodies.name subody_name FROM tbl_products 
					INNER JOIN tbl_subodies ON tbl_products.subody=tbl_subodies.id 
					ORDER BY tbl_products.created DESC ");
	return $db->resultset();
}
public function getProductGroups($prodId){
	$db=new Database;
	$db->query("SELECT * FROM tbl_products_groups	WHERE p_id=:pid");
	$db->bind("pid",$prodId);
	return $db->resultset();
}
public function getProduct($prodId){
	$db=new Database;
	$db->query("SELECT tbl_products.*,tbl_subodies.name subody_name FROM tbl_products 
					INNER JOIN tbl_subodies ON tbl_products.subody=tbl_subodies.id 
					WHERE tbl_products.id=:pid ORDER BY tbl_products.created DESC ");
	$db->bind("pid",$prodId);
	return $db->single();
}
public function getProductCategories($groupId)
{
	$db=new Database;
	$db->query("SELECT * FROM tbl_categories WHERE tbl_categories.group=:pid");
	$db->bind("pid",$groupId);
	return $db->resultset();
}
public function placeOrder($prodId,$group_category_Ids)
{
	$db=new Database;
	$order_id="sig_".substr(time(),-4,-1).rand(100,999);
	//$db->beginTransaction();
	foreach($group_category_Ids as $group => $category):
	$db->query("INSERT INTO tbl_orders (user_id,order_id,product_id,group_id,category_id)
				VALUES (:user_id,:order_id,:p_id,:g_id,:c_id)");
	$db->bind("p_id",$prodId);
	$db->bind("user_id",$_SESSION['user']->bits_id);
	$db->bind("order_id",$order_id);
	$db->bind("g_id",$group);
	$db->bind("c_id",$category);
	$db->execute();
	/*if(!($db->execute()))
		{$db->cancelTransaction();return false;}*/
	endforeach;
	//$db->endTransaction();
	return true;
 }

}



?>