<!-- today im writing this as a part of the journal checklist I forced myself onto.
well the above sentence is a lie, this isn't a checklist but I am too lazy to write journals on any other time of the day so I am writing it here during work.
so... it's been a long ass time since I have last written any form of textual piece describing my life. it's a week from the end of February and my relationship is going pretty
good. yesterday, it was my first time. i gave her the abcd and was about to do it. everything was going as smooth as butter, right? nope
fucking failed to get it up and in the desperate attempt of using some motion to lighten it up, I was done. never ever in the entire life had I expeted this to happen.
surprisingly, she is kind about this till now. right now, I'm feeling embarrased. I dont know what can/should I do but to cope with this, I'll read as much pages of the books I can,
I dont know how to fix my ed. I dont know if it's the same for everyone but damn that ws some unexpected turn of events lol. as of more. I feel like I have been postponing stuffs.
I want to transfer my university to other states but I have not been taking it seriously for now. I dont know how many deadliens have I missed but mehh can't complain about
what has already happened (esp last night) I'll try to cover up on all and remake a preiroty checklist for the rest of the semester. -->
<?php
require 'easySVG.php';
const HORIZ_N_OUTLINE_R = "M37.27894812 34.48421122h.33157896c.14210526 0 .1894737 0 .26052632.04736842.09473684.04736842.14210526.14210526.14210526.26052632 0 .09473684-.0236842.16578948-.07105263.2368421-.0236842.04736843-.07105263.04736843-.14210526.09473685h-.02368422l.26052633.49736844h-.1894737l-.2368421-.47368422h-.14210527v.47368422h-.18947368v-1.13684212zm.28421054.49736843h.09473684c.09473684-.0236842.14210527-.07105264.14210527-.1894737 0-.07105262-.0236842-.11842105-.09473685-.14210526h-.23684211v.33157895h.09473686zM34.815789 0H20.842105v10.65789H23.210526v5.87369L13.073684.54474 12.742105 0H0v10.65789H2.368421v14.68422H0V36H15.157895V25.34211H12.789474v-5.87369l10.136842 15.98684.355263.54474H36V25.34211H33.631579V10.65789H36V0h-1.184211zm.710527 1.18421v9h-2.368421v15.63158h2.368421v9.71053H23.542105l-.213158-.33158-11.013158-17.36053v7.98158h2.368422v9.71053H.473684v-9.71053h2.368421V10.18421H.473684V.47368h11.984211l.213158.33158 11.013158 17.36053v-7.98158h-2.368422V.47368h14.210527v.71053z";
const HORIZ_N_R_CIRCLE = "M37.681579 34.10526c-.544737 0-.971053.42632-.971053.94737S37.136842 36 37.657895 36c.521052 0 .947368-.42632.947368-.94737s-.426316-.94737-.923684-.94737zm-.02368 1.70527c-.426316 0-.757895-.33158-.757895-.7579 0-.42631.331579-.75789.757895-.75789.402631 0 .757894.35526.757894.75789 0 .42632-.331578.7579-.757894.7579z";
const HORIZ_N_FILL = "M24.394737 20.60526L12.078947 1.18421H1.184211v8.28947h2.368421v17.05264H1.184211v8.28947h12.789473v-8.28947h-2.368421V15.39474l12.31579 19.42105h10.894736v-8.28947h-2.368421V9.47368h2.368421V1.18421H22.026316v8.28947h2.368421v11.13158z";
const HORIZ_N_SERIF = "M37.657895 35.81053c-.426316 0-.757895-.33158-.757895-.7579 0-.42631.331579-.75789.757895-.75789.402631 0 .757894.35526.757894.75789 0 .42632-.331578.7579-.757894.7579z";
const HORIZ_N_R_FILL = "M34.815789.47368h-13.5v9.71053h2.368422v7.98158L12.671053.80526l-.189474-.33158H.473684v9.71053h2.368421v15.63158H.473684v9.71053h14.210527v-9.71053h-2.368422v-7.98158l11.013158 17.36053.213158.33158h11.984211v-9.71053h-2.368421V10.18421h2.368421V.47368h-.710527zM13.973684 26.52632v8.28947H1.184211v-8.28947h2.368421V9.47368H1.184211V1.18421h10.894736l12.31579 19.42105V9.47368h-2.368421V1.18421h12.789473v8.28947h-2.368421v17.05264h2.368421v8.28947H23.921053l-12.31579-19.42105v11.13158h2.368421z";


$svg = new EasySVG();
$svg->setFontSVG("Tungsten-Semibold.svg", 100, '#000000');
$svg->setLetterSpacing(0.05);
$svg->setFontSize(12);
$svg->setFontColor("#d00000");

$name = "COLLEGE OF BUSINESS";
$svg->addText($name,44, 7.75);
$text_width = $svg->textDimensions($name)[0];

$svg->addAttribute('viewBox', "0 0 " . ($text_width + 44) . " 36");
$svg->height = 36;
$svg->width = $text_width + 44;

$svg->addPath(HORIZ_N_R_CIRCLE, array('fill' => "#d00000"));
$svg->addPath(HORIZ_N_FILL, array('fill' => "#d00000"));
$svg->addPath(HORIZ_N_OUTLINE_R, array('fill' => "#d00000"));



echo $svg->asXML();
