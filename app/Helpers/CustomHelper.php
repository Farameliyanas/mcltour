// app/Helpers/CustomHelper.php

<?php

if (! function_exists('decryptPassword')) {
    /**
     * Decrypt the encrypted password.
     *
     * @param  string  $encryptedPassword
     * @return string
     */
    function decryptPassword($encryptedPassword)
    {
        return decrypt($encryptedPassword);
    }
}
