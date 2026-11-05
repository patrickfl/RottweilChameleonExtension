<?php
namespace Skins\Chameleon\Components;

class Logo extends Component {

	public function getHtml(){
		$href = $this->getSkin()->getConfig()->get( 'Server' ) . $this->getSkin()->getConfig()->get( 'ScriptPath' );

		$html = \Html::openElement(
				'a',
				array(
					'href' => $href,
					'class' => 'rw-banner rw-brandbar',
					'title' => 'Rottweiler Bilder'
				)
			);

		$html .= '<span class="rw-brandbar-text">Rottweiler Bilder</span>';
		$html .= \Html::closeElement( 'a' );

		return $html;
	}
}