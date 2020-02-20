
            <h2>Cours du 26 mars 2018</h2><br><?php
            

            $exo1 = new Cours("26 mars 2018");
            $exo1->ajouterQuestionReponse("not / to be / much longer / here / they are / likely","The are likely not to be here much longer");
            $exo1->ajouterQuestionReponse("to sign / the boss / unlikely / this document / is","The boss is unlikely to sign this document ");
            $exo1->ajouterQuestionReponse("a success / to become / unlikely / is / this product / is ","Unfortunately this product is unlikely to become a success ");
            $exo1->ajouterQuestionReponse("our decisions / all / is / he / to object / to / likely","he is likely to object to all our decisions ");
            $exo1->ajouterQuestionReponse("unlikely / to happen / this / here / was / ","This was unlikely to happen here");
            $exo1->ajouterQuestionReponse("industry / to / is / this / likely / here / develop","This industry is likely to develop here ");

            $exo1->afficherQuestionReponse("Rétablissez l'ordre correct des éléments de chaque phrase");

            echo "<hr />";

            $exo2 = new Cours("26 mars 2018");
            $exo2->ajouterQuestionReponse("When the clients (to arrive) he (to talk) with his partner. ",
              "When the clients <u>arrived</u> he <u>was talking</u> with his partner.");
            $exo2->ajouterQuestionReponse("As they (to unload) the van one of the boxes (to fall) open.",
              "As they <u>were unloading</u> the van one of the boxes <u>felt</u> open.");
            $exo2->ajouterQuestionReponse("They (to do) good bussiness when the recession (to hit) the country.",
              "They <u>were doing</u> good bussiness when the recession <u>hit</u> the country.");
            $exo2->ajouterQuestionReponse("He saw I (to have) difficulties with the new computer so he (to try) to help me out.",
              "He saw I <u>was having</u> difficulties with the new computer so he <u>tried</u> to help me out.");
            $exo2->ajouterQuestionReponse("We (to show) the visitors around when we (to hear) the news.",
              "We <u>were showing</u> the visitors around when we <u>heard</u> the news.");
            $exo2->ajouterQuestionReponse("The streets (to be) jammed what (to go) on ?",
              "The streets <u>was</u> jammed what <u>was going</u>  on ?");

            $exo2->afficherQuestionReponse("Dans les phrases suivantes, un verbe doit être conjugué au prétérit simple, l'autre au prétérit continu. Conjuguez chaque verbe au temps convenable. ");
            echo "<hr />";

            $exo3 = new Cours("26 mars 2018");
            $exo3->ajouterQuestionReponse("One is ( ... ) a man or a woman, you cannot be ( ... )",
              "One is <u>either</u> a man or a woman, you cannot be <u>both</u>");
            $exo3->ajouterQuestionReponse("Youssou Ndour ( ... ) a musician and a bussinessman",
              "Youssou Ndour <u>both</u> a musician and a bussinessman");
            $exo3->ajouterQuestionReponse("Hey! Stop You will ( ... ) close that door ( ... ) open it",
              "Hey! Stop You will <u>either</u> close that door <u>or</u> open it");
            $exo3->ajouterQuestionReponse("I like ( ... ) tea ( ... ) coffe. I drink only milk",
              "I like <u>neither</u> tea <u>nor</u> coffe. I drink only milk");

            $exo3->afficherQuestionReponse("Use the following words to clomplete the following sentenses ");



           ?>
