<!-- -----main---------------------------------------------------------------------------------------------- -->
<?php
// ---------------------------------
// 함수명	: db_conn
// 기능		: DB Connection
// 파라미터	: Obj	&$param_conn
// 리턴값	: 없음
// ---------------------------------
function db_conn( &$param_conn )
{
    $host = "localhost";
    $user = "root";
    $pass = "root506";
    $charset = "utf8mb4";
    $db_name = "minitwo";
    $dns = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset; 
    $pdo_option = 
        array(
            PDO::ATTR_EMULATE_PREPARES         => false 
            ,PDO::ATTR_ERRMODE                 => PDO::ERRMODE_EXCEPTION 
            ,PDO::ATTR_DEFAULT_FETCH_MODE      => PDO::FETCH_ASSOC 
        );
    
    try
    {
        $param_conn = new PDO( $dns, $user, $pass, $pdo_option );
    }
    catch( Exception $e)
    {   
        $param_conn = null;
        throw new Exception( $e->getMessage() );
    }
}
?>
<!-- ------------------------------------------------------------------------------------------------------- -->



<!-- -----user---------------------------------------------------------------------------------------------- -->
<?php
//------------------------------------------------
// 함수명   : user_info_all
// 기능     : 전체 유저정보 가져오기
// 파라미터 : Array
// 리턴값   : Array/String     $result/errorMSG
//------------------------------------------------
function user_info_all()
{
    //쿼리문
    $sql =
        " SELECT "
        ." * "
        ." FROM "
        ." user_info "
        ;
    
    //모든 글을 조건없이 배열로 가져온다
    $arr_prepare =array();

    // DB연결 부분
    $conn = null;     
    try
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    }
    catch( Exception $e)
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;   
    }
    return $result;
}

//------------------------------------------------
// 함수명   : user_info_update
// 기능     : 전체 유저정보 수정하기
// 파라미터 : Array
// 리턴값   : Array/String     $result/errorMSG
//------------------------------------------------
function user_info_update()
{
    //쿼리문
    $sql =
        

        " SELECT "
        ." * "
        ." FROM "
        ." user_info "
        ;
    
    //모든 글을 조건없이 배열로 가져온다
    $arr_prepare =array();

    // DB연결 부분
    $conn = null;     
    try
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    }
    catch( Exception $e)
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;   
    }
    return $result;
}


//------------------------------------------------
// 함수명   : user_delete_account
// 기능     : 유저의 탈퇴플래그 변경(0 -> 1)
// 파라미터 : Array     &$param_no
// 리턴값   : INT/STRING       $result/ERRMSG
//------------------------------------------------
function user_delete_account( &$param_no )
{
    $sql =
        " UPDATE "
        ." user_info "
        ." SET "
        ." u_delst = '1' "
        ." WHERE "
        ." u_delst = :u_delst "
        ;

        $arr_prepare
        = array(
            ":u_delst" => $param_no
        );

    $conn = null;
    try 
    {
        db_conn( $conn );
        $conn->beginTransaction();
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result_cnt = $stmt->rowCount();
        $conn->commit();
    } 
    catch ( Exception $e ) 
    {
        $conn->rollback();
        return $e->getMessage();
    }
    finally
    {
        $conn = null;
    }
    return $result;
}
?>
<!-- ------------------------------------------------------------------------------------------------------- -->



<!-- -----Product list-------------------------------------------------------------------------------------- -->
<?php
//------------------------------------------------
// 함수명   : product_info_all
// 기능     : 전체 상품정보 가져오기
// 파라미터 : Array
// 리턴값   : Array/String     $result/errorMSG
//------------------------------------------------
function product_info_all()
{
    //쿼리문
    $sql =
        " SELECT "
        ." * "
        ." FROM "
        ." product_info "
        ;
    
    //모든 글을 조건없이 배열로 가져온다
    $arr_prepare =array();

    // DB연결 부분
    $conn = null;     
    try
    {
        db_conn( $conn );
        $stmt = $conn->prepare( $sql );
        $stmt->execute( $arr_prepare );
        $result = $stmt->fetchAll();
    }
    catch( Exception $e)
    {
        return $e->getMessage();
    }
    finally
    {
        $conn = null;   
    }
    return $result;
}
?>
<!-- ------------------------------------------------------------------------------------------------------- -->