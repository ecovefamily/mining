<?php


require_once dirname(__FILE__)."/font_truetype_header.cls.php";


class Font_WOFF_Header extends Font_TrueType_Header {
  protected $Vrylphpo42p4 = array(
    "format"         => self::uint32,
    "flavor"         => self::uint32,
    "length"         => self::uint32,
    "numTables"      => self::uint16,
                        self::uint16,
    "totalSfntSize"  => self::uint32,
    "majorVersion"   => self::uint16,
    "minorVersion"   => self::uint16,
    "metaOffset"     => self::uint32,
    "metaLength"     => self::uint32,
    "metaOrigLength" => self::uint32,
    "privOffset"     => self::uint32,
    "privLength"     => self::uint32,
  );
}