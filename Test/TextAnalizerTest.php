<?php
    namespace test;

    use app\TextAnalizer;
    use PHPUnit\Framework\TestCase;

    class TextAnalizerTest extends TestCase {
        
        const TEXT = "TEST.";
        const REVERTED_TEXT = ".TSET";
        const WORDS = ["TEST"];
        const SENTENCES = ["TEST"];
        const NUMBER_OF_CHARS = 5; 
        const NUMBER_OF_WORDS = 1; 
        const NUMBER_OF_SENTANCES = 1; 
        const CHARS_FREQUENCY = 82.253687315634;
        const CHAR_DISTRIBUTION = [
            'A' => 0.12979351032448,
            'C' => 0.12979351032448,
            'D' => 0.18879056047198,
            'E' => 0.035398230088496,
            'F' => 0.070796460176991,
            'I' => 0.10619469026549,
            'L' => 0.011799410029499,
            'M' => 0.24778761061947,
            'N' => 0.27138643067847,
            'P' => 0.27138643067847,
            'Q' => 0.058997050147493,
            'S' => 0.21238938053097,
            'U' => 0.023598820058997,
            'V' => 0.17699115044248,
            'a' => 6.5604719764012,
            'b' => 1.0737463126844,
            'c' => 3.4218289085546,
            'd' => 2.0766961651917,
            'e' => 8.7197640117994,
            'f' => 0.64896755162242,
            'g' => 1.0619469026549,
            'h' => 0.43657817109145,
            'i' => 8.2713864306785,
            'j' => 0.058997050147493,
            'l' => 5.1799410029499,
            'm' => 4.1297935103245,
            'n' => 4.2949852507375,
            'o' => 3.669616519174,
            'p' => 1.6519174041298,
            'q' => 0.96755162241888,
            'r' => 4.8377581120944,
            's' => 6.6666666666667,
            't' => 6.9616519174041,
            'u' => 7.7050147492625,
            'v' => 1.0501474926254,
            'x' => 0.21238938053097
        ];
        const AVERAGE_WORD_LENGTH = 5;
        const AVERAGE_NUMBER_OF_SORDS_IN_A_SENTANCES = 8;
        
        const NUMBER_OF_PALINDROME_WORDS = 33;
        
        const IS_TEXT_PALINDROME = false;

        private static TextAnalizer $textAnalizer;

        public static function setUpBeforeClass(): void {
            self::$textAnalizer = new TextAnalizer(self::TEXT);
        }

        public function testCalculateLength() {
            $this->assertEquals(
                self::NUMBER_OF_CHARS,
                self::$textAnalizer->calculateLength(self::TEXT)
            );    
        }

        public function testGenerateRevertedText() {
            $this->assertEquals(
                self::REVERTED_TEXT,
                self::$textAnalizer->generateReversedText(self::TEXT)
            );
        }

        public function testGenerateListOfWords() {
            $this->assertEquals(
                self::WORDS,
                self::$textAnalizer->generateListOfWords(self::TEXT)
            );
        }

        public function testGenerateListOfSentences() {
            $this->assertEquals(
                self::SENTENCES,
                self::$textAnalizer->generateListOfSentences(self::TEXT)
            );
        }

    }