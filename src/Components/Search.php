<?php
namespace Skins\Chameleon\Components;

class Search extends Component {

	public function getHtml(){
		global $wgScript;

		$class = $this->getDomElement()->getAttribute( 'class' );

		$html = \Html::openElement(
				'form',
				array(
					'action' => $wgScript,
					'class' => $class
				)
			);

		$html .= \Html::element(
				'input',
				array(
					'type' => 'hidden',
					'name' => 'title'
				)
			);

		$html .= $this->getSkinTemplate()->makeSearchInput(
				[
					'type' => 'text',
					'class' =>  'rw-search-input'
				]
			);

		$html .= $this->getSkinTemplate()->makeSearchButton(
				'go',
				[
					'class' =>  'rw-search-button',
					'value' => wfMessage( 'search' )->plain()
				]
			);

		$html .= \Html::closeElement( 'form' );

		return $html;
	}
}