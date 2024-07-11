<?php

use PHPUnit\Framework\TestCase;
use RtfHtmlPhp\Document;
use RtfHtmlPhp\Html\HtmlFormatter;

final class InternationalTest extends TestCase
{
  public function testParseCharset134(): void
  {
    $rtf = file_get_contents(__DIR__ . "/rtf/international/charset-134.rtf");

    $document = new Document($rtf);
    $formatter = new HtmlFormatter();
    $html = $formatter->Format($document);    

    $this->assertEquals(
      '<p><span style="font-family:Tahoma;font-size:15px;color:#000000;">PC</span></p><br><p><span style="font-family:Tahoma;font-size:15px;color:#000000;">OE&nbsp;</span><span style="font-family:SimSun, monospace;font-size:15px;color:#000000;">&#28450;&#23383;</span><span style="font-family:Tahoma;font-size:15px;color:#000000;"> </span></p><p></p>',
      $html
    );
  }

  public function testParseCharset134Misc(): void
  {
    $rtf = file_get_contents(__DIR__ . "/rtf/international/charset-134-misc.rtf");

    $document = new Document($rtf);
    $formatter = new HtmlFormatter();
    $html = $formatter->Format($document);

    $this->assertEquals(
      '<p><span style="font-family:Calibri, sans-serif;font-size:14px;">1.&nbsp;</span><span style="font-size:14px;">&#25253;&#36865;&#35774;&#32622;</span></p><p><span>&#21333;&#20301;&#30331;&#35760;</span><span style="font-family:Calibri, sans-serif;">/</span><span>&#32534;&#36753;</span></p><p><span>&#20154;&#21592;&#30331;&#35760;</span><span style="font-family:Calibri, sans-serif;">/</span><span>&#32534;&#36753;</span></p><p><span>&#24314;&#31435;&#21333;&#20301;&#19982;&#20154;&#21592;&#30340;&#32852;&#31995;</span></p><p></p>',      $html
    );
  }
}
