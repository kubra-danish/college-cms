<?php
class AdminController {
    private $userModel;
    private $mailService;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
        $this->mailService = new MailService();
    }

    public function getAllUsers() {
        return $this->userModel->getAllUsers();
    }

    public function getUsersByRole($roleName) {
        return $this->userModel->getUsersByRole($roleName);
    }

    public function getUserById($id) {
        return $this->userModel->getUserById($id);
    }

    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'dashboard');
            exit();
        }

        $firstName  = trim($_POST['first_name'] ?? '');
        $lastName   = trim($_POST['last_name'] ?? '');
        $phone      = trim($_POST['phone'] ?? '');
        $email      = trim($_POST['email'] ?? '');
        $password   = trim($_POST['password'] ?? '');
        $department = trim($_POST['department'] ?? '');
        $roleId     = (int)($_POST['role_id'] ?? 0);
        $redirect   = trim($_POST['redirect_to'] ?? 'dashboard');

        if ($firstName === '' || $email === '' || $password === '' || !in_array($roleId, [2, 3], true)) {
            header('Location: ' . BASE_URL . $redirect . '&msg=invalid_input');
            exit();
        }

        $createdUser = $this->userModel->createUser(
            $firstName,
            $lastName,
            $email,
            $password,
            $roleId,
            $department,
            $phone !== '' ? $phone : null
        );

        if (!$createdUser) {
            header('Location: ' . BASE_URL . $redirect . '&msg=create_failed');
            exit();
        }

        $roleName = $this->userModel->getRoleNameById($roleId);

        $mailResult = $this->mailService->sendCredentialsEmail(
            $email,
            $firstName,
            $roleName,
            $email,
            $password
        );

        if ($mailResult['success']) {
            header('Location: ' . BASE_URL . $redirect . '&msg=created_and_emailed');
        } else {
            $error = urlencode($mailResult['error'] ?? 'Unknown mail error');
            header('Location: ' . BASE_URL . $redirect . '&msg=created_but_email_failed&mail_error=' . $error);
        }
        exit();
    }

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'dashboard');
            exit();
        }

        $id         = (int)($_POST['id'] ?? 0);
        $firstName  = trim($_POST['first_name'] ?? '');
        $lastName   = trim($_POST['last_name'] ?? '');
        $phone      = trim($_POST['phone'] ?? '');
        $email      = trim($_POST['email'] ?? '');
        $department = trim($_POST['department'] ?? '');
        $status     = trim($_POST['status'] ?? 'active');
        $redirect   = trim($_POST['redirect_to'] ?? 'dashboard');

        $updated = $this->userModel->updateUser(
            $id,
            $firstName,
            $lastName,
            $phone,
            $email,
            $department,
            $status
        );

        if ($updated) {
            header('Location: ' . BASE_URL . $redirect . '&msg=updated');
        } else {
            header('Location: ' . BASE_URL . $redirect . '&msg=update_failed');
        }
        exit();
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'dashboard');
            exit();
        }

        $id       = (int)($_POST['id'] ?? 0);
        $redirect = trim($_POST['redirect_to'] ?? 'dashboard');

        $deleted = $this->userModel->deleteUser($id);

        if ($deleted) {
            header('Location: ' . BASE_URL . $redirect . '&msg=deleted');
        } else {
            header('Location: ' . BASE_URL . $redirect . '&msg=delete_failed');
        }
        exit();
    }
}