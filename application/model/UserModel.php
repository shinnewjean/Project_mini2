<?php
namespace application\model;

class UserModel extends Model{
	// $pwFlg = true : 두번째 파라미터가 있으면 받아서 씀
	// 230516_add 동적 쿼리로 바꿈 -> $pwFlg = true추가
	public function getUser( $arrUserInfo, $pwFlg = true ) {
		// $sql =" select * from user_info where u_id = :id and u_pw = :pw ";
		$sql =" select * from user_info where u_id = :id "; // 230516_change if로 바꿈
		if ($pwFlg) {	 // 230516_add
			$sql .= " AND u_pw = :pw ";
		}

		$prepare = [
			":id" => $arrUserInfo["id"]
			// ,":pw" => $arrUserInfo["pw"] // 230516_del if로 바꿈
		];

		// pw추가 할경우
		if ($pwFlg) {	 // 230516_add
			$prepare[":pw"] = $arrUserInfo["pw"];
		}

		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
		} catch (Exception $e) {
			echo "UserModel->getUser Error : ".$e->getMessage();
			exit();
		}
		// finally {				// userController.php 에서 닫아줌 public function loginPost()참고
		// 	$this->closeConn();
		// }
		return $result;
	}
	
	// Insert User
	public function insertUser($arrUserInfo){
		// $sql = " INSERT INTO user_info(u_id,u_pw,u_name) VALUES(:u_id,:u_pw,:u_name) ";
		$sql =
		" INSERT INTO "
		."  user_info( "
		."      u_id "
		."      ,u_pw "
		."      ,u_name "
		." ) "
		." VALUES( "
		."      :u_id "
		."      ,:u_pw "
		."      ,:u_name "
		." ) "
		;

		$prepare = [
			":u_id" => $arrUserInfo["id"]
			,":u_pw" => $arrUserInfo["pw"]
			,":u_name" => $arrUserInfo["name"]
		];
		
		try {
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute($prepare);
			return $result;
		} catch (Exception $e) {
			// echo "UserModel->getUser Error : ".$e->getMessage(); // 230516_del usercon _ useinsert 부분으로 대체
			// exit();
			return false;
		}
	}

    // ----------------------------------------
    // Update User
    public function UpdateUser($arrUserInfo) {
        $sql =
            " UPDATE "
            ."      user_info "
            ." SET ";

        $arr_prepare = [
            ":u_no" => $arrUserInfo["u_no"]
        ];

        // 업데이트할 필드와 값을 동적으로 생성
        foreach($arrUserInfo as $key => $value) {
            if($key === "pw" && $value !== "") {
                $sql .= " u_pw = :u_$key, ";
                $arr_prepare[":u_$key"] = base64_encode($value);
            } else if ($key !== "u_no" && $value !== "") {
                $sql .= " ,u_$key = :u_$key ";
                $arr_prepare[":u_$key"] = $value;
            }
        }

        // 맨 처음 쉼표 제거
        // $sql = ltrim($sql, ",");
        $sql = preg_replace("/,/", "", $sql, 1);

        $sql .= " WHERE u_no = :u_no ";

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($arr_prepare);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // ----------------------------------------

    // delete User
    public function delUser($arrUserInfo) {
        $sql =
            " Update "
            ."      user_info "
            ." SET "
            ."      u_del_flg = 1 "
            ."      ,u_to_date = NOW() "
            ." WHERE "
            ."      u_no = :u_no "
            ;
        $arr_prepare = [
                ":u_no"           => $arrUserInfo["u_no"]
            ];

        try {
            $stmt = $this->conn->prepare( $sql );
            $result = $stmt->execute( $arr_prepare );
            return $result;
        } catch ( Exception $e ) {
            return false;
        }
    }

}