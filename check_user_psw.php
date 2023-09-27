/**
 * Проверка текущего пароля пользователя
 *
 * @param int $userId
 * @param string $password
 *
 * @return bool
 */
function isUserPassword($userId, $password)
{
    $userData = CUser::GetByID($userId)->Fetch();

    $salt = substr($userData['PASSWORD'], 0, (strlen($userData['PASSWORD']) - 32));

    $realPassword = substr($userData['PASSWORD'], -32);
    $password = md5($salt.$password);

    return ($password == $realPassword);
}
