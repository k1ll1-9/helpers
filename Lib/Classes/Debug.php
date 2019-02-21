<?
declare(strict_types=1);

namespace K11\Lib\Classes;

/**
 * Class Debug
 * @package K1ll1\Lib\Classes
 */
class Debug {
	/**
	 * @var bool
	 */
	private $debugger = false;

	/**
	 * Show info in console
	 *
	 * @param $obj
	 */
	public static function show($obj) {
		$backTrace     = \debug_backtrace()[0];
		$backTraceFile = $backTrace['file'];
		$backTraceLine = $backTrace['line'];

		$trace = [
			'calledFile' => $backTraceFile,
			'calledLine' => $backTraceLine,
			'trace'      => $obj
		];

		if (\is_resource($obj)) {
			$trace = [
				'type'     => \get_resource_type($obj),
				'metaData' => \stream_get_meta_data($obj),
				'isLocal'  => \stream_is_local($obj)
			];

			echo "<script>console.info('Debug find resource:');</script>";
		}

		$trace = \json_encode($trace);

		echo "<script>console.log($trace);</script>";
	}

	/**
	 * @param $callback
	 */
	public static function checkMicroTime($callback) {
		$startTime = \microtime(true);
		\call_user_func($callback);
		echo \microtime(true) - $startTime;
	}
}