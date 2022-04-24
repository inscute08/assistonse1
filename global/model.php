<?php

	date_default_timezone_set('Asia/Manila');
	Class Model {
		private $server = "us-cdbr-east-05.cleardb.net";
		private $username = "b97ac2cc002c36";
		private $password = "19b6b88b";
		private $dbname = "heroku_d738d2345bbb9d5";
		private $conn;

		public function __construct() {
			try {
				$this->conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);	
			} catch (Exception $e) {
				echo "Connection failed" . $e->getMessage();
			}
		}

		//////////////////////////////////////////// CHAT ////////////////////////////////////////////

		public function sendMessage($stud_id, $message) {
			$query = "INSERT INTO messages (to_id, from_id, user_type, message, timestamp, status) VALUES (?, ?, ?, ?, ?, ?)";

			if ($stmt = $this->conn->prepare($query)) {
				$default = 'admin';
				$status = 1;
				$type = "Logbook";
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param("issssi", $stud_id, $type, $default, $message, $date, $status);
				$stmt->execute();
				$stmt->close();
			}
		}
		public function fetchMessages($stud_id) {
			$data = null;

			$query = "SELECT * FROM messages WHERE (from_id = ? AND to_id = ?) OR (from_id = ? AND to_id = ?) ORDER BY timestamp";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("iiii", $_SESSION['sess'], $stud_id, $stud_id, $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchFirstStudent() {
			$data = null;

			$query = "SELECT a.*, b.timestamp FROM seniors AS a INNER JOIN messages AS b ON a.SeniorID = b.from_id OR b.to_id WHERE (from_id = a.SeniorID AND to_id = ?) OR (from_id = ? AND to_id = a.SeniorID) AND a.status = 1 ORDER BY b.timestamp DESC LIMIT 1";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $_SESSION['sess'], $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchStudentsList($id) {
			$data = null;

			$query = "SELECT DISTINCT a.*, b.timestamp FROM seniors a INNER JOIN messages b ON a.SeniorID = b.from_id OR a.SeniorID = b.to_id WHERE ((from_id = a.SeniorID AND to_id = ?) OR (from_id = ? AND to_id = a.SeniorID)) AND a.status = 1 AND NOT a.SeniorID = ? GROUP BY a.SeniorID ORDER BY b.timestamp DESC";
			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('iii', $_SESSION['sess'], $_SESSION['sess'], $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchMostRecent($stud_id) {
			$data = null;

			$query = "SELECT * FROM messages WHERE (from_id = ? AND to_id = ?) OR (from_id = ? AND to_id = ?) ORDER BY timestamp DESC LIMIT 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("iiii", $_SESSION['sess'], $stud_id, $stud_id, $_SESSION['sess']);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateReadStatus($stud_id) {
			$query = "UPDATE messages SET status = ? WHERE from_id = ? AND to_id = ? AND status = ? AND user_type = ?";
			if ($stmt = $this->conn->prepare($query)) {
				$status = 0;
				$unread_status = 1;
				
				$user_type = 'student';

				$stmt->bind_param('iiiis', $status, $stud_id, $_SESSION['sess'], $unread_status, $user_type);
				$stmt->execute();
				$stmt->close();
			}
		}

		//////////////////////////////////////////// CHAT END ////////////////////////////////////////////

		public function signIn($email, $password) {
			$query = "SELECT id, pword FROM admin WHERE uname = ?";
			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$stmt->bind_result($id, $hashed_pass);
				$stmt->store_result();
				if($stmt->num_rows > 0) {
					if($stmt->fetch()) {
						if (password_verify($password, $hashed_pass)) {
							$_SESSION['sess'] = $id;
							echo "<script>window.open('dashboard/index', '_self');</script>";
							exit();
						}

						else {
							echo "<script>alert('Wrong Password!');</script>";
							if (empty($_SESSION['lattempt'])) {
								$_SESSION['lattempt'] = 1;
							}
							
							else {
								switch ($_SESSION['lattempt']) {
									case 1:
										$_SESSION['lattempt']++;
										break;
									case 2:
										$_SESSION['lattempt']++;
										break;
									case 3:
										$_SESSION['lattempt']++;
										break;
									default:
										unset($_SESSION['lattempt']);
										setcookie('rlimited', '5', time() + (60), "/");
										setcookie('expiration_date_admin', time() + (60), time() + (60), "/");
										echo "<script>alert('Reached limit!')</script>";
								}
							}
						}
					}
				}
				else {
					echo "<script>alert('Email not found in database!');</script>";
				}
				$stmt->close();
			}
			$this->conn->close();
		}

		public function fetchAdminAccounts() {
			$data = null;

			$query = "SELECT * FROM admin WHERE 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchSeniorCitizenAccounts() {
			$data = null;

			$query = "SELECT * FROM seniors WHERE status = 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchApprovedAccounts() {
			$data = null;

			$query = "SELECT * FROM seniors WHERE Status = 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchPendingAccounts() {
			$data = null;

			$query = "SELECT * FROM seniors WHERE Status = 2";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchDeclinedAccounts() {
			$data = null;

			$query = "SELECT * FROM seniors WHERE Status = 3";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchArchivedAccounts() {
			$data = null;

			$query = "SELECT * FROM seniors WHERE Status = 4";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchUpcomingActivities($status) {
			$data = null;

			$query = "SELECT * FROM activities WHERE date_from >= ? AND status = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$stmt->bind_param('si', $date, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchActivities($status) {
			$data = null;

			$query = "SELECT * FROM activities WHERE status = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchActivitiesDetails($id) {
			$data = null;

			$query = "SELECT * FROM activities WHERE control_no = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchNews() {
			$data = null;

			$query = "SELECT * FROM news WHERE status = 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchArchivedNews() {
			$data = null;

			$query = "SELECT * FROM news WHERE status = 0";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function fetchPreviousActivities($status) {
			$data = null;

			$query = "SELECT * FROM activities WHERE date_from <= ? AND status = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$date = date("Y-m-d H:i:s");
				$stmt->bind_param('si', $date, $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function addAdmin($id_number, $name, $position, $contact, $email, $hashed_password) {
			$query = "INSERT INTO admin (id_number, name, uname, pword, position, contact) VALUES (?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssss', $id_number, $name, $email, $hashed_password, $position, $contact);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('information', '_self');</script>";
			}
		}

		public function addActivity($date_from, $date_until, $activity_type, $event_title, $description, $organizer, $venue, $benefits, $amount) {
			$query = "INSERT INTO activities (date_from, date_until, activity_type, event_title, description, organizer, venue, benefits, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssssss', $date_from, $date_until, $activity_type, $event_title, $description, $organizer, $venue, $benefits, $amount);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('activities', '_self');</script>";
			}
		}

		public function addNews($date_from, $date_until, $title, $basename, $unique_name, $content) {
			$query = "INSERT INTO news (title, image, image_id, date_from, date_until, content, status, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$status = 1;
				$date = date("Y-m-d H:i:s");

				$stmt->bind_param('ssssssis', $title, $basename, $unique_name, $date_from, $date_until, $content, $status, $date);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('index', '_self');</script>";
			}
		}

		public function addSenior($sen_id, $first_name, $middle_name, $last_name, $senior_status, $gender, $contact, $landline, $civil_status, $birthdate, $address, $email, $user_id, $password, $guardian_name, $guardian_contact, $guardian_landline) {
			$query = "INSERT INTO seniors (SeniorID, SenLastName, SenFirstName, SenMiddleName, SenStatus, HomeAdd, Birthdate, Gender, CivilStatus, SenLandLineNumber, SenMobileNumber, SenEmailAdd, UserId, UserPassword, QRcode, NameOfGuardian, GuardianMobileNumber, GuardianLandlineNumber, Senior_Citizen, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$qr = 'N/A';
				$status = 1;
				$sen = 1;

				$stmt->bind_param('ssssssssssssssssssii', $sen_id, $last_name, $first_name, $middle_name, $senior_status, $address, $birthdate, $gender, $civil_status, $landline, $contact, $email, $user_id, $password, $qr, $guardian_name, $guardian_contact, $guardian_landline, $sen, $status);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('senior_citizen', '_self');</script>";
			}
		}

		public function register($sen_id, $first_name, $middle_name, $last_name, $senior_status, $gender, $contact, $landline, $civil_status, $birthdate, $address, $email, $user_id, $password, $guardian_name, $guardian_contact, $guardian_landline) {
			$query = "INSERT INTO seniors (SeniorID, SenLastName, SenFirstName, SenMiddleName, SenStatus, HomeAdd, Birthdate, Gender, CivilStatus, SenLandLineNumber, SenMobileNumber, SenEmailAdd, UserId, UserPassword, QRcode, NameOfGuardian, GuardianMobileNumber, GuardianLandlineNumber, Senior_Citizen, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			if($stmt = $this->conn->prepare($query)) {
				$qr = 'N/A';
				$status = 1;
				$sen = 0;

				$stmt->bind_param('ssssssssssssssssssii', $sen_id, $last_name, $first_name, $middle_name, $senior_status, $address, $birthdate, $gender, $civil_status, $landline, $contact, $email, $user_id, $password, $qr, $guardian_name, $guardian_contact, $guardian_landline, $sen, $status);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('approved_registrations', '_self');</script>";
			}
		}

		public function updateStatus($id, $status) {
			$query = "UPDATE seniors SET Status = ? WHERE SeniorID = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateActivityStatus($id, $status) {
			$query = "UPDATE activities SET status = ? WHERE control_no = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteRegistration($id) {
			$query = "DELETE FROM seniors WHERE SeniorID = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function deleteAdmin($id) {
			$query = "DELETE FROM admin WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateSeniorInfo($edit_id, $first_name, $middle_name, $last_name, $gender, $contact, $landline, $civil_status, $birthdate, $address, $guardian_name, $guardian_contact, $guardian_landline) {
			$query = "UPDATE seniors SET SenLastName = ?, SenFirstName = ?, SenMiddleName = ?, HomeAdd = ?, Birthdate = ?, Gender = ?, CivilStatus = ?, SenLandLineNumber = ?, SenMobileNumber = ?, NameOfGuardian = ?, GuardianMobileNumber = ?, GuardianLandlineNumber = ? WHERE SeniorID = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssssssssssi', $last_name, $first_name, $middle_name, $address, $birthdate, $gender, $civil_status, $landline, $contact, $guardian_name, $guardian_contact, $guardian_landline, $edit_id);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('senior_citizen', '_self');</script>";
			}
		}

		public function updateInfo($info) {
			$query = "UPDATE privileges SET info = ? WHERE id = 1";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('s', $info);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchInfo($table) {
			$query = "SELECT * FROM ".$table." WHERE 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateNewsStatus($status, $news_id) {
			$query = "UPDATE news SET status = ? WHERE news_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $news_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function updateNews($title, $date_from, $date_until, $content, $news_id) {
			$query = "UPDATE news SET title = ?, date_from = ?, date_until = ?, content = ? WHERE news_id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssi', $title, $date_from, $date_until, $content, $news_id);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('index', '_self');</script>";
			}
		}

		public function updateActivities($date_from, $date_until, $activity_type, $event_title, $description, $organizer, $venue, $id) {
			$query = "UPDATE activities SET date_from = ?, date_until = ?, activity_type = ?, event_title = ?, description = ?, organizer = ?, venue = ? WHERE control_no = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('sssssssi', $date_from, $date_until, $activity_type, $event_title, $description, $organizer, $venue, $id);
				$stmt->execute();
				$stmt->close();

				echo "<script>window.open('edit_activity?id=".$id."', '_self');</script>";
			}
		}

		public function editAdmin($name, $email, $pos, $con, $id) {
			$query = "UPDATE admin SET name = ?, uname = ?, position = ?, contact = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ssssi', $name, $email, $pos, $con, $id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchComplaints($status) {
			$data = null;

			$query = "SELECT * FROM complaints AS a INNER JOIN seniors AS b ON a.senior_id = b.SeniorID WHERE a.complaint_status = ?";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('i', $status);
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateComplaintStatus($remove_id, $status) {
			$query = "UPDATE complaints SET complaint_status = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $remove_id);
				$stmt->execute();
				$stmt->close();
			}
		}

		public function fetchRequests() {
			$data = null;

			$query = "SELECT * FROM requests AS a INNER JOIN seniors AS b ON a.senior_id = b.SeniorID WHERE a.request_status = 1";

			if ($stmt = $this->conn->prepare($query)) {
				$stmt->execute();
				$result = $stmt->get_result();
				$num_of_rows = $stmt->num_rows;
				while ($row = $result->fetch_assoc()) {
					$data[] = $row;
				}
				$stmt->close();
			}
			return $data;
		}

		public function updateRequestStatus($remove_id, $status) {
			$query = "UPDATE requests SET request_status = ? WHERE id = ?";

			if($stmt = $this->conn->prepare($query)) {
				$stmt->bind_param('ii', $status, $remove_id);
				$stmt->execute();
				$stmt->close();
			}
		}
	}
?>
