SiRA : Simple REST Api
======================

SiRA is a very simple framework to build light-weight REST APIs under PHP.

Currently, only replies data in JSON format, but it should be trivial to add support for other formats, like XML.


Entry Point
-----------

All requests to SiRA are done via the sira.php file.

SiRA assumes you are using URL rewriting (see the included .htaccess file for more details).

A GET request, could look something like this:

`http://localhost/sira/customer?name=FloppySoftware`

or:

`http://www.myhost.com/api/v1/customer?name=FloppySoftware`


REST Controllers
----------------

Controllers are defined in the cfg.php file, and take the form:

```php
$CFG_CONTROLLERS = array(
		'test' => array(
			'folder' => 'res_test',
			'get'    => 'test_get',
			'put'    => 'test_put',
			'post'   => 'test_post',
			'delete' => 'test_delete'
		),
		'info' => array(
			'folder' => 'res_info',
			'get'    => 'info_get'
		)
	);
```

As you can see, `test` and `info` are two resources. The field `folder` defines the directory
where is located the corresponding resource. The fields `get`, `put`, `post` and
`delete`, define the HTTP methods that are supported by the resource, and contain the name of the
corresponding PHP file (and the function, see below).

Following the example above, we will have the following folder structure:

```
sira/
	res_test/
		test_get.php
		test_put.php
		test_post.php
		test_delete.php
	res_info
		info_get.php
	...
```

In the test_get.php file, we will have something like this:

```php
	function test_get($params)
	{
		$reply = array(
			'reply' => 'Hello from test_get()'
		);
		
		return $reply;
	}
```

And so on.


Author
------

(c) 2016 Miguel Garcia / FloppySoftware.

http://www.floppysoftware.es
floppysoftware@gmail.com


License
-------

SiRA is released under the GNU Public License v3.
