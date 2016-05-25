<?php

/**
 * Shortcuts for Yii framework
 */
class Y
{
	/**
	 * Returns application module
	 * @param string $moduleName application module name
	 * @return CModule
	 */
	public static function module($moduleName)
	{
		return Yii::app()->getModule($moduleName);
	}

	/**
	 * Returns application component
	 * @param string $componentName application component name (request, db, user, etc...)
	 * @return CComponent
	 */
	protected static function component($componentName)
	{
		return Yii::app()->getComponent($componentName);
	}

	/**
	 * @return CFormatter
	 */
	public static function format()
	{
		return Yii::app()->getComponent('format');
	}

	/**
	 * @return CFormatter
	 */
	public static function numberFormatter()
	{
		return Yii::app()->getComponent('numberFormatter');
	}

	/**
	 * @return CClientScript
	 */
	public static function script()
	{
		return Yii::app()->getComponent('clientScript');
	}

	/**
	 * @return CHttpRequest
	 */
	public static function request()
	{
		return Yii::app()->getComponent('request');
	}

	/**
	 * @return CHttpSession
	 */
	public static function session()
	{
		return Yii::app()->getComponent('session');
	}

	/**
	 * Returns the cache component
	 *
	 * @param string $cacheId ID of the cache component, defaults to 'cache'
	 * @return ICache
	 */
	public static function cache($cacheId = 'cache')
	{
		return Yii::app()->getComponent($cacheId);
	}

	/**
	 * @return WebUser
	 */
	public static function user()
	{
		return Yii::app()->getComponent('user');
	}

	/**
	 * Removes a session variable
	 * @param string $key the name of the session variable to be removed
	 * @return mixed the removed value, null if no such session variable
	 */
	public static function deleteSession($key)
	{
		return Yii::app()->getComponent('session')->remove($key);
	}

	/**
	 * Returns the session variable value or $defaultValue if the session variable does not exist
	 * @param string $key the session variable name
	 * @param mixed $defaultValue the default value to be returned when the session variable does not exist
	 * @return mixed the session variable value, or $defaultValue if the session variable does not exist
	 */
	public static function getSession($key, $defaultValue = null)
	{
		return Yii::app()->getComponent('session')->get($key, $defaultValue);
	}

	/**
	 * Sets a session variable
	 * @param string $key session variable name
	 * @param mixed $value session variable value
	 */
	public static function setSession($key, $value)
	{
		Yii::app()->getComponent('session')->add($key, $value);
	}

	/**
	 * Creates and returns a DB command for execution
	 * @param string|array $query the DB query to be executed. This can be either a string representing a SQL statement,
	 * or an array representing different fragments of a SQL statement. Please refer to {@link CDbCommand::__construct}
	 * for more details about how to pass an array as the query. If this parameter is not given, you will have to call
	 * query builder methods of {@link CDbCommand} to build the DB query.
	 * @param string $dbId ID of the DB component, default value is 'db'
	 * @return CDbCommand
	 */
	public static function dbCmd($query = '', $dbId = 'db')
	{
		return Yii::app()->getComponent($dbId)->createCommand($query);
	}

	/**
	 * Returns the $_GET variable value or $defaultValue if the $_GET variable does not exist
	 * @param string $name the $_GET variable name (could be used dot delimiter for nested variable)
	 * Example: variable name 'Post.post_text' will return value at $_GET['Post']['post_text']
	 * @param mixed $defaultValue the default value to be returned when the $_GET variable does not exist
	 * @return mixed
	 */
	public static function getGet($name, $defaultValue = null)
	{
		return self::getValue($name, $_GET, $defaultValue);
	}

	/**
	 * Returns the $_POST variable value or $defaultValue if the $_POST variable does not exist
	 *
	 * @param string $name the $_POST variable name (could be used dot delimiter for nested variable)
	 * Example: variable name 'Post.post_text' will return value at $_POST['Post']['post_text']
	 * @param mixed $defaultValue the default value to be returned when the $_POST variable does not exist
	 * @return mixed
	 */
	public static function getPost($name, $defaultValue = null)
	{
		return self::getValue($name, $_POST, $defaultValue);
	}

	/**
	 * Returns the $_REQUEST variable value or $defaultValue if the $_REQUEST variable does not exist
	 *
	 * @param string $name the $_REQUEST variable name (could be used dot delimiter for nested variable)
	 * Example: variable name 'Post.post_text' will return value at $_REQUEST['Post']['post_text']
	 * @param mixed $defaultValue the default value to be returned when the $_REQUEST variable does not exist
	 * @return mixed
	 */
	public static function getRequest($name, $defaultValue = null)
	{
		return self::getValue($name, $_REQUEST, $defaultValue);
	}

	/**
	 * Returns the $_FILES variable value or $defaultValue if the $_FILES variable does not exist
	 *
	 * @param string $name the $_FILES variable name (could be used dot delimiter for nested variable)
	 * Example: variable name 'userfile.name' will return value at $_FILES['userfile']['name']
	 * @param mixed $defaultValue the default value to be returned when the $_FILES variable does not exist
	 * @return mixed
	 */
	public static function getFiles($name, $defaultValue = null)
	{
		return self::getValue($name, $_FILES, $defaultValue);
	}

	/**
	 * Returns the PDO instance
	 *
	 * @param string $dbId ID of the DB component, default value is 'db'
	 * @return \PDO the PDO instance, null if the connection is not established yet
	 */
	public static function getPdo($dbId = 'db')
	{
		return Yii::app()->getComponent($dbId)->getPdoInstance();
	}

	/**
	 * Returns the relative URL for the application
	 * @param bool $absolute whether to return an absolute URL. Defaults to false, meaning returning a relative one
	 * @return string
	 */
	public static function baseUrl($absolute = false)
	{
		return Yii::app()->getComponent('request')->getBaseUrl($absolute);
	}

	/**
	 * Return if the request is sent via secure channel (https)
	 * @return bool
	 */
	public static function isSecureConnection()
	{
		return Yii::app()->getComponent('request')->getIsSecureConnection();
	}

	/**
	 * Returns whether this is an AJAX (XMLHttpRequest) request
	 * @return bool
	 */
	public static function isAjaxRequest()
	{
		return Yii::app()->getComponent('request')->getIsAjaxRequest();
	}

	/**
	 * Returns whether this is a PUT request
	 * @return bool
	 */
	public static function isPutRequest()
	{
		return Yii::app()->getComponent('request')->getIsPutRequest();
	}

	/**
	 * Returns whether this is a DELETE request
	 * @return bool
	 */
	public static function isDeleteRequest()
	{
		return Yii::app()->getComponent('request')->getIsDeleteRequest();
	}

	/**
	 * Returns whether this is a POST request
	 * @return bool
	 */
	public static function isPostRequest()
	{
		return Yii::app()->getComponent('request')->getIsPostRequest();
	}

	/**
	 * Deletes a value with the specified key from cache
	 * @param string $key the key of the value to be deleted
	 * @param string $cacheId ID of the cache component, defaults to 'cache'
	 * @return boolean
	 */
	public static function cacheDelete($key, $cacheId = 'cache')
	{
		return Yii::app()->getComponent($cacheId)->delete($key);
	}

	/**
	 * Retrieves a value from cache with a specified key
	 * @param string $key a key identifying the cached value
	 * @param string $cacheId ID of the cache component, defaults to 'cache'
	 * @return mixed
	 */
	public static function cacheGet($key, $cacheId = 'cache')
	{
		return Yii::app()->getComponent($cacheId)->get($key);
	}


	/**
	 * Попробовать получить значение из кеша, а если не нашли выполнить callback и записать его значение в кеш
	 * @param string $key
	 * @param callable $callback
	 * @param int $expire
	 * @param ICacheDependency $dependency
	 * @param string $cacheId
	 * @return mixed
	 */
	public static function cacheGetOrUpdate($key, $callback, $expire = 0, $dependency = null, $cacheId = 'cache')
	{
		if (($result = self::cacheGet($key, $cacheId)) === false) {
			$result = call_user_func($callback);
			self::cacheSet($key, $result, $expire, $dependency, $cacheId);
		}

		return $result;
	}


	/**
	 * Stores a value identified by a key into cache. If the cache already contains such a key,
	 * the existing value and expiration time will be replaced with the new ones.
	 * @param string $key the key identifying the value to be cached
	 * @param mixed $value the value to be cached
	 * @param integer $expire the number of seconds in which the cached value will expire, 0 means never expire
	 * @param ICacheDependency $dependency dependency of the cached item.
	 * If the dependency changes, the item is labeled invalid (see {@link ICacheDependency})
	 * @param string $cacheId ID of the cache component, defaults to 'cache'
	 * @return boolean
	 */
	public static function cacheSet($key, $value, $expire = 0, $dependency = null, $cacheId = 'cache')
	{
		return Yii::app()->getComponent($cacheId)->set($key, $value, $expire, $dependency);
	}

	/**
	 * Removes a cookie with the specified name. Since Yii v1.1.11, the second parameter is available
	 * that can be used to specify the options of the CHttpCookie being removed (see {@link CCookieCollection::remove})
	 * @param string $name cookie name
	 * @param array $options cookie configuration array consisting of name-value pairs
	 * @return CHttpCookie|null The removed cookie object or null if cookie doesn't exist
	 */
	public static function cookieDelete($name, $options = [])
	{
		return Yii::app()->getComponent('request')->getCookies()->remove($name, $options);
	}

	/**
	 * Returns the cookie with the specified name
	 * @param string $name cookie name
	 * @param mixed $defaultValue the default value to be returned when the cookie does not exist
	 * @return mixed
	 */
	public static function cookieGet($name, $defaultValue = null)
	{
		$cookie = Yii::app()->getComponent('request')->getCookies()->itemAt($name);

		if ($cookie) {
			return $cookie->value;
		}

		return $defaultValue;
	}

	/**
	 * Adds a cookie with the specified name
	 * @param string $name cookie name
	 * @param string|CHttpCookie $value cookie value or CHttpCookie object
	 * (if it's CHttpCookie object than all following params are ignored,
	 * @param int $expire the time in seconds after which the cookie expires (84600 means 1 day).
	 * Defaults to 0, meaning "until the browser is closed".
	 * @param string $path the path on the server in which the cookie will be available on. The default is '/'.
	 * @param string $domain domain of the cookie
	 * @param bool $secure whether cookie should be sent via secure connection
	 * @param bool $httpOnly whether the cookie should be accessible only through the HTTP protocol.
	 * By setting this property to true, the cookie will not be accessible by scripting languages, such as JavaScript,
	 * which can effectly help to reduce identity theft through XSS attacks. Note, this property is only effective for
	 * PHP 5.2.0 or above.
	 */
	public static function cookieSet($name, $value, $expire = null, $path = '/', $domain = '', $secure = false, $httpOnly = false)
	{
		if ($value instanceof CHttpCookie) {
			$cookie = $value;
		} else {
			$cookie = new CHttpCookie($name, $value);
			$cookie->expire = $expire ? ($expire + time()) : 0;
			$cookie->path = $path;
			$cookie->domain = $domain;
			$cookie->secure = $secure;
			$cookie->httpOnly = $httpOnly;
		}

		Yii::app()->getComponent('request')->getCookies()->add($name, $cookie);
	}

	/**
	 * Returns the random token used to perform CSRF validation
	 * @return string
	 */
	public static function csrf()
	{
		return Yii::app()->getComponent('request')->getCsrfToken();
	}

	/**
	 * Returns the name of the token used to prevent CSRF, defaults to 'YII_CSRF_TOKEN'
	 * @return string
	 */
	public static function csrfName()
	{
		return Yii::app()->getComponent('request')->csrfTokenName;
	}

	/**
	 * Returns ready to use 'key: value' string with CSRF token
	 * Primary usage: AJAX POST requests
	 * jQuery example:
	 *      $.post('url', { param: "blabla", <?=Y::csrfJsParam();?> }, ...)
	 * becomes:
	 *      $.post('url', { param: "blabla", "YII_CSRF_TOKEN": "n32Nm3112nqBQIjf..." }, ...)
	 * @return string
	 */
	public static function csrfJsParam()
	{
		$request = Yii::app()->getComponent('request');

		return '"' . $request->csrfTokenName . '":"' . $request->getCsrfToken() . '"';
	}

	/**
	 * Shortcut with 'pre' tags for dump function of CVarDumper class
	 * @param mixed $var variable to be dumped
	 * @param boolean $doEnd whether the application should be stopped after dumping
	 */
	public static function dump($var, $doEnd = true)
	{
		echo '<pre>';
		CVarDumper::dump($var, 10, true);
		echo '</pre>';

		if ($doEnd) {
			Yii::app()->end();
		}
	}

	/**
	 * Prints some text and stops the application
	 * @param string $text text to be printed before application stopped
	 */
	public static function end($text = '')
	{
		echo $text;
		Yii::app()->end();
	}

	/**
	 * Converts data to JSON/JSONP, prints it out and stops the application
	 * @param mixed $data data to be converted in JSON
	 * @param int $options JSON options (JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, JSON_HEX_APOS,
	 * JSON_NUMERIC_CHECK, JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT)
	 * Note, this parameter is only effective when json_encode function is available!
	 * @param string $callback name of the callback function for JSONP response
	 */
	public static function endJson($data, $options = 0, $callback = '')
	{
		$result = function_exists('json_encode') ? json_encode($data, $options) : CJSON::encode($data);

		if (empty($callback)) {
			header('Content-Type: application/json;');
			echo $result;
		} else {
			header('Content-Type: application/javascript;');
			echo $callback . '(' . $result . ');';
		}

		Yii::app()->end();
	}

	/**
	 * Returns/stores a flash message. A flash message is available only in the current and the next requests.
	 *
	 * @param string $key key identifying the flash message
	 * @param mixed $message flash message to store or false to get a flash message (null to remove flash message)
	 * Example:
	 *   Y::flash('a', 'b')  - stores flash message 'b'
	 *   Y::flash('a')       - returns flash message for key 'a'
	 *   Y::flash('a', null) - removes flash message with key 'a'
	 * @return string
	 */
	public static function flash($key, $message = false)
	{
		$user = Yii::app()->getComponent('user');

		if ($message === false) {
			return $user->getFlash($key);
		} else {
			$user->setFlash($key, $message);
		}

		return null;
	}

	/**
	 * Whether or not user have a flash message with specified key
	 * @param string $key key identifying the flash message
	 * @return bool
	 */
	public static function hasFlash($key)
	{
		return Yii::app()->getComponent('user')->hasFlash($key);
	}

	/**
	 * Stores a flash message and redirects to specified route
	 * @param string $key key identifying the flash message
	 * @param string $message flash message
	 * @param string $route the URL route to redirect to (see {@link CController::createUrl})
	 * @param array $params additional GET parameters (see {@link CController::createUrl})
	 */
	public static function flashAndRedirect($key, $message, $route, $params = [])
	{
		Yii::app()->getComponent('user')->setFlash($key, $message);
		Yii::app()->getComponent('request')->redirect(self::url($route, $params));
	}

	/**
	 * Performs access check for this user
	 * @param string $operation the name of the operation that need access check
	 * @param array $params name-value pairs that would be passed to business rules associated with the tasks and roles
	 * assigned to the user. Since Yii v1.1.11 a param with name 'userId' is added to this array, which holds
	 * the value of getId() when CDbAuthManager or CPhpAuthManager is used
	 * @param bool $allowCaching whether to allow caching the result of access check.
	 * When this parameter is true (default), if the access check of an operation was performed before,
	 * its result will be directly returned when calling this method to check the same operation. If this parameter is
	 * false, this method will always call CAuthManager::checkAccess to obtain the up-to-date access result. Note that
	 * this caching is effective only within the same request and only works when $params=array()
	 * @return boolean whether the operations can be performed by this user
	 */
	public static function checkAccess($operation, $params = [], $allowCaching = true)
	{
		return Yii::app()->getComponent('user')->checkAccess($operation, $params, $allowCaching);
	}

	/**
	 * Returns true if the user is authenticated, otherwise - false
	 * @return boolean
	 */
	public static function isAuthenticated()
	{
		return !Yii::app()->getComponent('user')->getIsGuest();
	}

	/**
	 * Returns true if the user is a guest (not authenticated), otherwise - false
	 * @return boolean
	 */
	public static function isGuest()
	{
		return Yii::app()->getComponent('user')->getIsGuest();
	}

	/**
	 * Returns user-defined application parameter
	 * @param string $key key identifying the parameter (could be used dot delimiter for nested key)
	 * Example: 'Media.Foto.thumbsize' will return value at ['Media']['Foto']['thumbsize']
	 * @param mixed $defaultValue the default value to be returned when the parameter variable does not exist
	 * @return mixed
	 */
	public static function param($key, $defaultValue = null)
	{
		return self::getValue($key, Yii::app()->getParams(), $defaultValue);
	}

	/**
	 * Redirects the browser to the specified route
	 * @param string $route the URL route to redirect to (see {@link CController::createUrl})
	 * @param array $params additional GET parameters (see {@link CController::createUrl})
	 */
	public static function redirect($route, $params = [])
	{
		Yii::app()->getComponent('request')->redirect(self::url($route, $params));
	}

	/**
	 * Redirects the browser to the specified route if the user is authenticated
	 * @param string $route the URL route to redirect to (see {@link CController::createUrl})
	 * @param array $params additional GET parameters (see {@link CController::createUrl})
	 */
	public static function redirectIfAuthenticated($route, $params = [])
	{
		if (!Yii::app()->getComponent('user')->getIsGuest()) {
			Yii::app()->getComponent('request')->redirect(self::url($route, $params));
		}
	}

	/**
	 * Redirects the browser to the specified route if the user is a guest
	 * @param string $route the URL route to redirect to (see {@link CController::createUrl})
	 * @param array $params additional GET parameters (see {@link CController::createUrl})
	 */
	public static function redirectIfGuest($route, $params = [])
	{
		if (Yii::app()->getComponent('user')->getIsGuest()) {
			Yii::app()->getComponent('request')->redirect(self::url($route, $params));
		}
	}

	/**
	 * Prints application memory, SQL queries and time usage
	 * @param boolean $return whether data should be returned or printed out
	 * @return string|null
	 */
	public static function stats($return = false)
	{
		$stats = '';
		$dbStats = Yii::app()->getDb()->getStats();

		if (is_array($dbStats)) {
			$stats = 'SQL queries: ' . $dbStats[0] . ' (in ' . round($dbStats[1], 5) . ' seconds)<br />';
		}

		$logger = Yii::getLogger();
		$memory = round($logger->getMemoryUsage() / 1048576, 3);
		$time = round($logger->getExecutionTime(), 3);

		$stats .= 'Used memory: ' . $memory . ' Mb<br />';
		$stats .= 'Execution time: ' . $time . ' seconds';

		if ($return) {
			return $stats;
		}

		echo $stats;
		return null;
	}

	/**
	 * Returns a relative URL based on the given controller and action information
	 * For more information see {@link CApplication::createUrl} and {@link CController::createUrl}
	 * @param string $route the URL route, this should be in the format of 'ControllerID/ActionID'
	 * @param array $params additional GET parameters (name=>value), both the name and value will be URL-encoded
	 * @return string
	 */
	public static function url($route, $params = [])
	{
		if (is_object($controller = Yii::app()->getController())) {
			return $controller->createUrl($route, $params);
		}

		return Yii::app()->createUrl($route, $params);
	}

	/**
	 * Returns a value that uniquely represents the user, if null - it means the user is a guest
	 * @return mixed
	 */
	public static function userId()
	{
		return Yii::app()->getComponent('user')->getId();
	}

	/**
	 * Returns the array variable value or $defaultValue if the array variable does not exist
	 * @param string $key the array variable name (could be used dot delimiter for nested variable)
	 * Example: variable name 'Media.Foto.thumbsize' will return value at $array['Media']['Foto']['thumbsize']
	 * @param ArrayAccess $array an array containing variable to return
	 * @param mixed $defaultValue the default value to be returned when the array variable does not exist
	 * @return mixed
	 */
	public static function getValue($key, $array, $defaultValue = null)
	{
		if (strpos($key, '.') === false) {
			return (isset($array[$key])) ? $array[$key] : $defaultValue;
		}

		$keys = explode('.', $key);
		$firstKey = array_shift($keys);

		if (!isset($array[$firstKey])) {
			return $defaultValue;
		}

		$value = $array[$firstKey];

		foreach ($keys as $k) {
			if (!isset($value[$k]) && !array_key_exists($k, $value)) {
				return $defaultValue;
			}
			$value = $value[$k];
		}

		return $value;
	}

	/**
	 * Форматирование денежных сумм
	 * @param float $value сумма
	 * @param string $currency
	 * @return string
	 */
	public static function formatCurrency($value, $currency = 'RUB')
	{
		return \Yii::app()->numberFormatter->formatCurrency($value, $currency);
	}

	/**
	 * Возвращаем либо строку либо дефолтное значение, если она не определена
	 * @param string $value Выводимое значение
	 * @param string $default Дефолтное значение
	 * @return string
	 */
	public static function get($value, $default = '')
	{
		return isset($value) ? $value : $default;
	}

	/**
	 * имя класса без неймспейсов
	 * @param object $obj
	 * @return string
	 */
	public static function shortClass($obj)
	{
		$reflect = new ReflectionClass($obj);
		return $reflect->getShortName();
	}
}
