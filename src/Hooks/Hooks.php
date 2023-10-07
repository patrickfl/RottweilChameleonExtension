<?php

use MediaWiki\MediaWikiServices;

class RottweilChameleonExtensionHooks 
{
    public static function onSkinSubPageSubtitle( string &$subpages, Skin $skin, OutputPage $out ) {
        if( !$skin->getTitle()->isSubpage() || 
        $skin->getTitle()->getNamespace() == 10) {
            $subpages = '';
            return false;
        }
        
        $parentTitle = $skin->getTitle()->getBaseTitle();
        $ancestorTitles = [];
        while( $parentTitle->isSubpage() ) {
            $ancestorTitles[] = $parentTitle;
            $parentTitle = $parentTitle->getBaseTitle();
        }
        $ancestorTitles[] = $parentTitle;
        $ancestorTitles = array_reverse( $ancestorTitles );

        $linkList = [];
        $linkRenderer = \MediaWiki\MediaWikiServices::getInstance()->getLinkRenderer();
        foreach( $ancestorTitles as $title ) {
            $wikipage = \WikiPage::factory( $title );
            $parserOptions = $wikipage->makeParserOptions( $skin->getContext() );
            $parserOutput = $wikipage->getParserOutput( $parserOptions );
            $displayName = '';
            if( $parserOutput ) {
                $displayName = $parserOutput->getTitleText();
            }
            $linkList[] = $linkRenderer->makeLink( $title, $displayName );
        }
        $subpages = implode( ' / ', $linkList );
        return false;
    }
}
