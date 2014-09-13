<?php namespace UrlShortener\Validation;

class LinkValidator extends AbstractValidator {

	/**
	 * Link minification form rules
	 * @var array
	 */
	protected static $rules = [
		'url'	=> 'required|url|unique:links,url',
		'hash'	=> 'unique:links,hash|min:3|max:10'
	];
}