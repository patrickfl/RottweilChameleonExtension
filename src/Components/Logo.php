<?php
namespace Skins\Chameleon\Components;

class Logo extends Component {

	public function getHtml(){
		global $wgScriptPath;

		$html = \Html::openElement(
				'a',
				array(
					'href' => $this->getSkin()->getConfig()->get( 'Server' ) . $this->getSkin()->getConfig()->get( 'ScriptPath' ),
					'class' => 'rw-banner'
				)
			);

		$html .= \Html::openElement(
				'img',
				array(
					'src' => $wgScriptPath . "/extensions/RottweilChameleonExtension/resources/images/titelleiste.jpg"
				)
			);
		$html .= \Html::closeElement( 'img' );

		$html .= \Html::closeElement( 'a' );

		return $html;
	}
}