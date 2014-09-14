<?php namespace UrlShortener\Validation;

class LinkForm extends AbstractValidator {

	/**
	 * Link minification form rules
	 * @var array
	 */
	protected static $rules = [
		'url'	=> 'required|url|unique:links,url',
		'hash'	=> 'required|unique:links,hash|max:10'
	];
}