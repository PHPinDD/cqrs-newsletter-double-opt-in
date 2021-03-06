<?php
/**
 *
 * @author h.woltersdorf
 */

namespace PHPinDD\CqrsNewsletter\Domains\Newsletter\Read\QueryHandlers;

use PHPinDD\CqrsNewsletter\Domains\Newsletter\Interfaces\NewsletterReadServiceInterface;
use PHPinDD\CqrsNewsletter\Domains\Newsletter\Read\Queries\ShowResendConfirmationFormQuery;
use PHPinDD\CqrsNewsletter\Responses\TwigPage;

/**
 * Class ShowResendConfirmationFormQueryHandler
 *
 * @package PHPinDD\CqrsNewsletter\Domains\Newsletter\Read\QueryHandlers
 */
final class ShowResendConfirmationFormQueryHandler
{
	/** @var NewsletterReadServiceInterface */
	private $newsletterReadService;

	/**
	 * @param NewsletterReadServiceInterface $newsletterReadService
	 */
	public function __construct( NewsletterReadServiceInterface $newsletterReadService )
	{
		$this->newsletterReadService = $newsletterReadService;
	}

	/**
	 * @param ShowResendConfirmationFormQuery $query
	 */
	public function handle( ShowResendConfirmationFormQuery $query )
	{
		if ( isset($_SESSION['show-resend-confirmation-form']) )
		{
			$feedback = $_SESSION['show-resend-confirmation-form'];
		}
		else
		{
			$feedback = [ ];
		}

		$page = new TwigPage(
			'Newsletter/Read/Pages/ResendConfirmationForm.twig',
			[
				'feedback' => $feedback,
			]
		);

		$page->respond();
	}
}
