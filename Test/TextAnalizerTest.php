<?php
    namespace test;

    use PHPUnit\Framework\TestCase;

    class TextAnalizerTest extends TestCase {
        
        const TEXT = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique ante vitae nibh maximus, quis hendrerit dolor maximus. Cras sagittis mauris a vulputate pellentesque. Donec dictum ligula tempus, pulvinar tellus sed, rutrum mauris. Cras feugiat, elit luctus sagittis tempor, erat massa maximus tortor, sit amet malesuada diam quam eget ipsum. Morbi dictum lacus ut nibh ultrices ultrices. Morbi pretium eu lacus a viverra. Morbi tristique purus est, vel aliquam nisl sodales a. Vestibulum et sagittis ex. Vivamus fringilla augue elementum erat tristique dictum. Vivamus ut rhoncus lectus. Praesent egestas consectetur porttitor. Integer maximus laoreet nulla, non commodo ante auctor et. Vestibulum ac bibendum massa.

        Ut fringilla sed neque at facilisis. Donec eleifend tellus a lacus porttitor maximus. Proin euismod auctor risus a convallis. Nulla viverra tincidunt arcu consectetur volutpat. Duis faucibus iaculis accumsan. Nam augue felis, aliquet eget tortor et, consectetur auctor felis. Fusce hendrerit magna nisi, eu lacinia odio ultricies quis. Morbi porttitor tristique metus, nec interdum turpis sagittis hendrerit. Morbi maximus sollicitudin nulla sed fermentum. Morbi viverra tortor nisl, at elementum tortor placerat quis. Curabitur bibendum tellus eros, quis elementum sem interdum id. Nam pellentesque ipsum et ante lobortis laoreet. Aenean porta mauris eget est elementum vestibulum. Morbi non ultrices nibh. Duis finibus nisl rutrum orci vehicula, sed rutrum lectus lacinia.
        
        Nam eu convallis ipsum, vitae scelerisque nisi. Curabitur finibus pellentesque tortor eget auctor. Nullam cursus dolor a aliquet lobortis. Vestibulum finibus sem id malesuada aliquam. Suspendisse potenti. Nulla commodo in erat ut finibus. Mauris sed egestas lorem. Etiam nec ultricies eros. Curabitur sit amet nibh a dui mattis iaculis. Phasellus vel auctor arcu. Vestibulum condimentum condimentum ante vitae aliquam. Nam neque urna, commodo sed erat id, suscipit lobortis ex.
        
        Fusce quis tempor orci. Pellentesque at est placerat, malesuada urna et, fringilla lacus. Aenean sollicitudin, metus quis pharetra convallis, urna ex pretium orci, at bibendum nulla augue in ligula. Phasellus feugiat ex et ultrices luctus. Fusce felis mi, ultricies et risus vitae, sagittis semper nisi. Etiam porta, lacus nec luctus aliquet, massa metus luctus lacus, id scelerisque leo odio tempus ipsum. Sed vehicula lobortis suscipit. Aenean nibh elit, congue ac libero vitae, scelerisque ultricies elit. Quisque eleifend sagittis est, in ultrices sapien interdum at. Duis imperdiet quam in purus feugiat euismod ut facilisis lorem.
        
        Suspendisse aliquam hendrerit nunc nec volutpat. Aenean nec rhoncus tortor. Sed egestas consectetur nulla, nec fermentum arcu ornare ut. Curabitur ullamcorper lobortis velit nec sagittis. Curabitur et porttitor quam, in dictum sem. Morbi et lobortis est. Aliquam quis dui id mi ultricies sollicitudin. Pellentesque ut euismod elit, ac scelerisque eros. Integer tincidunt ipsum eget quam tincidunt, a placerat nulla condimentum. Sed sit amet erat sit amet ex tristique sagittis et nec eros. Morbi facilisis orci aliquam malesuada commodo. Nam iaculis at dui ut viverra. Duis porta dapibus est.
        
        Integer non arcu nec velit auctor ultrices sit amet at lorem. Suspendisse non ipsum orci. Phasellus ut aliquam ipsum, ac suscipit est. Nam commodo sodales fermentum. Aenean nec tellus mi. Proin ac lacinia lectus. Maecenas fermentum dolor eu dictum posuere. Proin velit risus, elementum non euismod eu, condimentum at sapien. Mauris quis urna interdum, lacinia quam sit amet, pulvinar nulla. Mauris et commodo lacus.
        
        Nunc dui turpis, maximus eget semper in, semper at ex. Phasellus in dui vitae odio luctus placerat id et velit. Sed porta ante id nulla dapibus ornare. Aenean a rutrum tortor. Ut pretium, ante vitae finibus pharetra, ligula orci aliquet augue, vitae aliquet tellus erat aliquet tortor. Vivamus ligula diam, pellentesque vel mattis tristique, convallis at magna. Donec sollicitudin sem non ligula elementum, quis tristique mauris laoreet. Nulla eu justo sit amet orci porta blandit. Nam auctor lectus neque, nec fermentum ligula vulputate eu.
        
        Nullam at libero ac ligula rhoncus semper. Donec sed elit vulputate, tincidunt orci vel, maximus erat. Donec finibus cursus nulla lobortis varius. Nulla ultrices, risus vel mollis finibus, turpis leo egestas tortor, in posuere massa nibh vel augue. Curabitur quis justo est. Phasellus sit amet eros sit amet quam blandit ultrices. Phasellus non consectetur enim. Sed aliquam arcu sit amet diam euismod fringilla. Sed auctor mi felis, vel fermentum lorem varius sed. Sed ultrices quis augue ut pulvinar. Praesent commodo quam tempor felis placerat tempor. Sed sed lacus egestas, sollicitudin magna eu, porta mi.
        
        Suspendisse placerat nisi dolor, id tempus sapien lacinia nec. Vestibulum et nunc a purus luctus luctus. Morbi vitae ultrices sem. Etiam a venenatis ex, ut vehicula odio. Vivamus arcu mauris, tempus et massa mollis, elementum lobortis mauris. Quisque ligula ante, laoreet lacinia faucibus a, semper vitae dui. Donec viverra rutrum elit ut feugiat. Sed nec ex viverra, mollis magna eget, tempor purus.
        
        Mauris fermentum eleifend diam, vitae blandit dui condimentum eu. Integer mattis lectus eu urna faucibus, eget pharetra turpis volutpat. Maecenas condimentum ipsum at luctus consectetur. Cras semper risus lectus, at tristique nibh dignissim at. Suspendisse pretium laoreet feugiat. Duis tempor urna vel mauris pretium rutrum. Fusce molestie porttitor turpis, nec venenatis leo congue eu. Proin a cursus arcu.
        
        Proin venenatis augue nisl, in vulputate ligula convallis id. Integer tempus consequat enim feugiat tempor. Integer tristique dignissim sem a fringilla. Vestibulum congue arcu mi, a elementum diam fermentum quis. Vivamus purus ipsum, lacinia nec auctor semper, dapibus eget velit. Nunc tellus nibh, lobortis eu placerat vitae, maximus vel ligula. Pellentesque sagittis ac orci non pretium. Vestibulum quis commodo mauris, sodales consectetur nisl. Fusce id nunc semper, sollicitudin sapien sit amet, mollis mi. Nullam pellentesque velit at libero tempus, ut mollis tortor malesuada. Donec quis ullamcorper metus. Nullam nec metus ornare, porta nisi eu, accumsan lorem.
        
        Quisque efficitur fringilla erat, eget iaculis nibh venenatis id. Duis congue nisi in felis blandit, eu consectetur nulla iaculis. Mauris gravida arcu non nisi accumsan, ac vehicula neque interdum. Mauris et tempor nibh. Nunc quis nunc metus. Donec vulputate justo diam. Nulla ultrices metus nec semper blandit. Proin ultricies aliquam sem, vitae dignissim lectus vulputate a. Aliquam ac dolor non dolor sagittis dictum sit amet at diam. Pellentesque risus odio, ultrices sed mollis sit amet, sodales et mi. Praesent facilisis, velit nec interdum suscipit, mauris sem elementum diam, a elementum eros ligula non arcu. Integer at sodales diam. Donec nec aliquet urna, non hendrerit arcu. Aliquam dictum dolor ut purus pharetra sollicitudin.
        
        Mauris eget augue dapibus, tempus purus in, lacinia ante. Suspendisse vitae enim eu turpis maximus mollis. Quisque suscipit metus quis orci semper, quis facilisis magna tristique. Curabitur et odio vitae orci interdum volutpat a ac nulla. Aenean nec iaculis dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse mollis libero et condimentum congue. In sed ligula mi. Morbi iaculis, dolor placerat commodo placerat, dolor massa dictum elit, condimentum pretium lectus elit sit amet tellus.
        
        Proin faucibus, nisi vitae consequat faucibus, lectus sapien bibendum libero, ac mollis leo risus ac risus. Sed tincidunt mi et blandit blandit. Nunc diam nibh, rutrum sit amet massa non, ullamcorper commodo nunc. Vestibulum felis dolor, lacinia non cursus sed, malesuada at augue. Mauris eget varius dolor. Nulla vel vehicula enim. Nullam eu sollicitudin urna, sit amet convallis diam. Pellentesque rutrum mattis accumsan. Vestibulum sagittis, nisi quis faucibus porttitor, justo lorem rutrum risus, vitae ultrices turpis lorem faucibus ipsum. Quisque non aliquam ligula.
        
        Aliquam erat volutpat. In hac habitasse platea dictumst. Nullam feugiat ligula purus, sit amet ullamcorper mi cursus et. Fusce gravida lacinia egestas. Duis condimentum fermentum sodales. Sed vitae leo purus. Proin tincidunt vehicula justo quis dapibus. Pellentesque lectus sem, laoreet at magna eu, placerat gravida felis.";
        const REVERTED_TEXT = ".silef adivarg tarecalp ,ue angam ta teeroal ,mes sutcel euqsetnelleP .subipad siuq otsuj alucihev tnudicnit niorP .surup oel eativ deS .selados mutnemref mutnemidnoc siuD .satsege ainical adivarg ecsuF .te susruc im reprocmallu tema tis ,surup alugil taiguef malluN .tsmutcid aetalp essatibah cah nI .taptulov tare mauqilA

        .alugil mauqila non euqsiuQ .muspi subicuaf merol siprut secirtlu eativ ,susir murtur merol otsuj ,rotittrop subicuaf siuq isin ,sittigas mulubitseV .nasmucca sittam murtur euqsetnelleP .maid sillavnoc tema tis ,anru niduticillos ue malluN .mine alucihev lev alluN .rolod suirav tege siruaM .eugua ta adauselam ,des susruc non ainical ,rolod silef mulubitseV .cnun odommoc reprocmallu ,non assam tema tis murtur ,hbin maid cnuN .tidnalb tidnalb te im tnudicnit deS .susir ca susir oel sillom ca ,orebil mudnebib neipas sutcel ,subicuaf tauqesnoc eativ isin ,subicuaf niorP
                
        .sullet tema tis tile sutcel muiterp mutnemidnoc ,tile mutcid assam rolod ,tarecalp odommoc tarecalp rolod ,silucai ibroM .im alugil des nI .eugnoc mutnemidnoc te orebil sillom essidnepsuS ;earuc ailibuc ereusop secirtlu te sutcul icro subicuaf ni simirp muspi etna mulubitseV .rolod silucai cen naeneA .allun ca a taptulov mudretni icro eativ oido te rutibaruC .euqitsirt angam sisilicaf siuq ,repmes icro siuq sutem tipicsus euqsiuQ .sillom sumixam siprut ue mine eativ essidnepsuS .etna ainical ,ni surup supmet ,subipad eugua tege siruaM
        
        .niduticillos arterahp surup tu rolod mutcid mauqilA .ucra tirerdneh non ,anru teuqila cen cenoD .maid selados ta regetnI .ucra non alugil sore mutnemele a ,maid mutnemele mes siruam ,tipicsus mudretni cen tilev ,sisilicaf tnesearP .im te selados ,tema tis sillom des secirtlu ,oido susir euqsetnelleP .maid ta tema tis mutcid sittigas rolod non rolod ca mauqilA .a etatupluv sutcel missingid eativ ,mes mauqila seicirtlu niorP .tidnalb repmes cen sutem secirtlu alluN .maid otsuj etatupluv cenoD .sutem cnun siuq cnuN .hbin ropmet te siruaM .mudretni euqen alucihev ca ,nasmucca isin non ucra adivarg siruaM .silucai allun rutetcesnoc ue ,tidnalb silef ni isin eugnoc siuD .di sitanenev hbin silucai tege ,tare allignirf ruticiffe euqsiuQ
        
        .merol nasmucca ,ue isin atrop ,eranro sutem cen malluN .sutem reprocmallu siuq cenoD .adauselam rotrot sillom tu ,supmet orebil ta tilev euqsetnellep malluN .im sillom ,tema tis neipas niduticillos ,repmes cnun di ecsuF .lsin rutetcesnoc selados ,siruam odommoc siuq mulubitseV .muiterp non icro ca sittigas euqsetnelleP .alugil lev sumixam ,eativ tarecalp ue sitrobol ,hbin sullet cnuN .tilev tege subipad ,repmes rotcua cen ainical ,muspi surup sumaviV .siuq mutnemref maid mutnemele a ,im ucra eugnoc mulubitseV .allignirf a mes missingid euqitsirt regetnI .ropmet taiguef mine tauqesnoc supmet regetnI .di sillavnoc alugil etatupluv ni ,lsin eugua sitanenev niorP
        
        .ucra susruc a niorP .ue eugnoc oel sitanenev cen ,siprut rotittrop eitselom ecsuF .murtur muiterp siruam lev anru ropmet siuD .taiguef teeroal muiterp essidnepsuS .ta missingid hbin euqitsirt ta ,sutcel susir repmes sarC .rutetcesnoc sutcul ta muspi mutnemidnoc saneceaM .taptulov siprut arterahp tege ,subicuaf anru ue sutcel sittam regetnI .ue mutnemidnoc iud tidnalb eativ ,maid dnefiele mutnemref siruaM
        
        .surup ropmet ,tege angam sillom ,arreviv xe cen deS .taiguef tu tile murtur arreviv cenoD .iud eativ repmes ,a subicuaf ainical teeroal ,etna alugil euqsiuQ .siruam sitrobol mutnemele ,sillom assam te supmet ,siruam ucra sumaviV .oido alucihev tu ,xe sitanenev a maitE .mes secirtlu eativ ibroM .sutcul sutcul surup a cnun te mulubitseV .cen ainical neipas supmet di ,rolod isin tarecalp essidnepsuS
        
        .im atrop ,ue angam niduticillos ,satsege sucal des deS .ropmet tarecalp silef ropmet mauq odommoc tnesearP .ranivlup tu eugua siuq secirtlu deS .des suirav merol mutnemref lev ,silef im rotcua deS .allignirf domsiue maid tema tis ucra mauqila deS .mine rutetcesnoc non sullesahP .secirtlu tidnalb mauq tema tis sore tema tis sullesahP .tse otsuj siuq rutibaruC .eugua lev hbin assam ereusop ni ,rotrot satsege oel siprut ,subinif sillom lev susir ,secirtlu alluN .suirav sitrobol allun susruc subinif cenoD .tare sumixam ,lev icro tnudicnit ,etatupluv tile des cenoD .repmes sucnohr alugil ca orebil ta malluN
        
        .ue etatupluv alugil mutnemref cen ,euqen sutcel rotcua maN .tidnalb atrop icro tema tis otsuj ue alluN .teeroal siruam euqitsirt siuq ,mutnemele alugil non mes niduticillos cenoD .angam ta sillavnoc ,euqitsirt sittam lev euqsetnellep ,maid alugil sumaviV .rotrot teuqila tare sullet teuqila eativ ,eugua teuqila icro alugil ,arterahp subinif eativ etna ,muiterp tU .rotrot murtur a naeneA .eranro subipad allun di etna atrop deS .tilev te di tarecalp sutcul oido eativ iud ni sullesahP .xe ta repmes ,ni repmes tege sumixam ,siprut iud cnuN
        
        .sucal odommoc te siruaM .allun ranivlup ,tema tis mauq ainical ,mudretni anru siuq siruaM .neipas ta mutnemidnoc ,ue domsiue non mutnemele ,susir tilev niorP .ereusop mutcid ue rolod mutnemref saneceaM .sutcel ainical ca niorP .im sullet cen naeneA .mutnemref selados odommoc maN .tse tipicsus ca ,muspi mauqila tu sullesahP .icro muspi non essidnepsuS .merol ta tema tis secirtlu rotcua tilev cen ucra non regetnI
        
        .tse subipad atrop siuD .arreviv tu iud ta silucai maN .odommoc adauselam mauqila icro sisilicaf ibroM .sore cen te sittigas euqitsirt xe tema tis tare tema tis deS .mutnemidnoc allun tarecalp a ,tnudicnit mauq tege muspi tnudicnit regetnI .sore euqsirelecs ca ,tile domsiue tu euqsetnelleP .niduticillos seicirtlu im di iud siuq mauqilA .tse sitrobol te ibroM .mes mutcid ni ,mauq rotittrop te rutibaruC .sittigas cen tilev sitrobol reprocmallu rutibaruC .tu eranro ucra mutnemref cen ,allun rutetcesnoc satsege deS .rotrot sucnohr cen naeneA .taptulov cen cnun tirerdneh mauqila essidnepsuS
        
        .merol sisilicaf tu domsiue taiguef surup ni mauq teidrepmi siuD .ta mudretni neipas secirtlu ni ,tse sittigas dnefiele euqsiuQ .tile seicirtlu euqsirelecs ,eativ orebil ca eugnoc ,tile hbin naeneA .tipicsus sitrobol alucihev deS .muspi supmet oido oel euqsirelecs di ,sucal sutcul sutem assam ,teuqila sutcul cen sucal ,atrop maitE .isin repmes sittigas ,eativ susir te seicirtlu ,im silef ecsuF .sutcul secirtlu te xe taiguef sullesahP .alugil ni eugua allun mudnebib ta ,icro muiterp xe anru ,sillavnoc arterahp siuq sutem ,niduticillos naeneA .sucal allignirf ,te anru adauselam ,tarecalp tse ta euqsetnelleP .icro ropmet siuq ecsuF
        
        .xe sitrobol tipicsus ,di tare des odommoc ,anru euqen maN .mauqila eativ etna mutnemidnoc mutnemidnoc mulubitseV .ucra rotcua lev sullesahP .silucai sittam iud a hbin tema tis rutibaruC .sore seicirtlu cen maitE .merol satsege des siruaM .subinif tu tare ni odommoc alluN .itnetop essidnepsuS .mauqila adauselam di mes subinif mulubitseV .sitrobol teuqila a rolod susruc malluN .rotcua tege rotrot euqsetnellep subinif rutibaruC .isin euqsirelecs eativ ,muspi sillavnoc ue maN
        
        .ainical sutcel murtur des ,alucihev icro murtur lsin subinif siuD .hbin secirtlu non ibroM .mulubitsev mutnemele tse tege siruam atrop naeneA .teeroal sitrobol etna te muspi euqsetnellep maN .di mudretni mes mutnemele siuq ,sore sullet mudnebib rutibaruC .siuq tarecalp rotrot mutnemele ta ,lsin rotrot arreviv ibroM .mutnemref des allun niduticillos sumixam ibroM .tirerdneh sittigas siprut mudretni cen ,sutem euqitsirt rotittrop ibroM .siuq seicirtlu oido ainical ue ,isin angam tirerdneh ecsuF .silef rotcua rutetcesnoc ,te rotrot tege teuqila ,silef eugua maN .nasmucca silucai subicuaf siuD .taptulov rutetcesnoc ucra tnudicnit arreviv alluN .sillavnoc a susir rotcua domsiue niorP .sumixam rotittrop sucal a sullet dnefiele cenoD .sisilicaf ta euqen des allignirf tU
        
        .assam mudnebib ca mulubitseV .te rotcua etna odommoc non ,allun teeroal sumixam regetnI .rotittrop rutetcesnoc satsege tnesearP .sutcel sucnohr tu sumaviV .mutcid euqitsirt tare mutnemele eugua allignirf sumaviV .xe sittigas te mulubitseV .a selados lsin mauqila lev ,tse surup euqitsirt ibroM .arreviv a sucal ue muiterp ibroM .secirtlu secirtlu hbin tu sucal mutcid ibroM .muspi tege mauq maid adauselam tema tis ,rotrot sumixam assam tare ,ropmet sittigas sutcul tile ,taiguef sarC .siruam murtur ,des sullet ranivlup ,supmet alugil mutcid cenoD .euqsetnellep etatupluv a siruam sittigas sarC .sumixam rolod tirerdneh siuq ,sumixam hbin eativ etna euqitsirt sarC .tile gnicsipida rutetcesnoc ,tema tis rolod muspi meroL";
        const WORDS = [];
        const SENTENCES = [];
        const NUMBER_OF_CHARS = 8475; 
        const NUMBER_OF_WORDS = 1243; 
        const NUMBER_OF_SENTANCES = 163; 
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
        
        /*
        Top 10 most used words: 
        et 
        nec 
        at 
        quis 
        a 
        vitae 
        amet 
        sit 
        eu 
        non
        
        Top 10 longest words: 
        Pellentesque 
        sollicitudin 
        pellentesque 
        ullamcorper 
        condimentum 
        Suspendisse 
        scelerisque 
        consectetur 
        vestibulum 
        Vestibulum
        
        Top 10 shortest words: 
        a 
        ut 
        eu 
        et 
        ex 
        ac 
        Ut 
        at 
        id 
        in
        
        Top 10 longest sentences: 
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse mollis libero et condimentum congue 
        Morbi iaculis, dolor placerat commodo placerat, dolor massa dictum elit, condimentum pretium lectus elit sit amet tellus 
        Vestibulum sagittis, nisi quis faucibus porttitor, justo lorem rutrum risus, vitae ultrices turpis lorem faucibus ipsum 
        Cras feugiat, elit luctus sagittis tempor, erat massa maximus tortor, sit amet malesuada diam quam eget ipsum 
        Praesent facilisis, velit nec interdum suscipit, mauris sem elementum diam, a elementum eros ligula non arcu 
        Ut pretium, ante vitae finibus pharetra, ligula orci aliquet augue, vitae aliquet tellus erat aliquet tortor 
        Aenean sollicitudin, metus quis pharetra convallis, urna ex pretium orci, at bibendum nulla augue in ligula 
        Proin faucibus, nisi vitae consequat faucibus, lectus sapien bibendum libero, ac mollis leo risus ac risus 
        Etiam porta, lacus nec luctus aliquet, massa metus luctus lacus, id scelerisque leo odio tempus ipsum 
        Nulla ultrices, risus vel mollis finibus, turpis leo egestas tortor, in posuere massa nibh vel augue
        
        Top 10 shortest sentences: 
        In sed ligula mi 
        Suspendisse potenti 
        Proin a cursus arcu 
        Sed vitae leo purus 
        Aenean nec tellus mi 
        Nunc quis nunc metus 
        Morbi et lobortis est 
        Mauris et tempor nibh 
        Aliquam erat volutpat 
        Fusce quis tempor orci
        */

        const NUMBER_OF_PALINDROME_WORDS = 33;
        
        const IS_TEXT_PALINDROME = false;

        private static TextAnalizer $textAnalizer;

        public static function setUpBeforeClass(): void {
            self::$textAnalizer = new TextAnalizer(self::TEXT);
        }

        public function testCalculateLength() {
            $this->assertEquals(
                self::NUMBER_OF_CHARS,
                self::$textAnalizer->numberOfCharacters
            );    
        }

        public function testGenerateRevertedText() {
            $this->assertEquals(
                self::REVERTED_TEXT,
                self::$textAnalizer->reversedText
            );
        }

        public function testGenerateListOfWords() {
            $this->assertEquals(
            );
        }

        public function testSetWordsByUsage() {
            $this->assertEquals(
            );
        }

        public function testGenerateListOfSentences() {
            $this->assertEquals(
            );
        }

        public function testSetWordsByLength() {
            $this->assertEquals(
            );
        }

        public function testSetSentancesByLength() {
            $this->assertEquals(
            );
        }

        public function testSetAvaregeLengthOfWord() {
            $this->assertEquals(
            );
        }

        public function testSetAvaregeNumberOfWordsInSentances() {
            $this->assertEquals(
            );
        }

        public function testSetDistributionOfCharacters() {
            $this->assertEquals(
            );
        }

        private function testSetNumberOfPalindromes() {
            $this->assertEquals(
                self::IS_TEXT_PALINDROME,
                self::$textAnalizer->isTextPalindrome
            );
        }

        private function testIsTextPalindromes() {
            $this->assertEquals(
                self::NUMBER_OF_PALINDROME_WORDS,
                self::$textAnalizer->numberOfPalindromes
            );
        }
    }