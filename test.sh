A=$(echo '\033[1;31m')
B=$(echo '\033[1;33m')

echo    "           \033[1;31m[+]==============================[\033[1;33mBSTRD SENDER\033[1;31m]================================[+]\n"
echo    "           \033[1;31m                 ██████${B}╗ ${A}███████${B}╗${A}████████${B}╗${A}██████${B}╗ ${A}██████${B}╗ 	"
echo    "           \033[1;31m                 ██${B}╔══${A}██${B}╗${A}██${B}╔════╝╚══${A}██${B}╔══╝${A}██${B}╔══${A}██${B}╗${A}██${B}╔══${A}██${B}╗	"
echo    "           \033[1;31m                 ██████${B}╔╝${A}███████${B}╗   ${A}██${B}║   ${A}██████${B}╔╝${A}██${B}║  ${A}██${B}║	"
echo    "           \033[1;31m                 ██${B}╔══${A}██${B}╗╚════${A}██${B}║   ${A}██${B}║   ${A}██${B}╔══${A}██${B}╗${A}██${B}║  ${A}██${B}║	"
echo    "           \033[1;31m                 ██████${B}╔╝${A}███████${B}║   ${A}██${B}║   ${A}██${B}║  ${A}██${B}║${A}██████${B}╔╝	"
echo    "           \033[1;31m                 ${B}╚═════╝ ╚══════╝   ╚═╝   ╚═╝  ╚═╝╚═════╝	\n"
echo    "           \033[1;31m[+]======================[\033[1;33mNGEJUNK MULU EAAA KINTILLLL\033[1;31m]========================[+]"
echo "\033[0m";
rm -rf "temp/persend.txt"
rm -rf "temp/every.txt"
while true; do
    read -p "           [+] How Many Persend ? : " persend
    case $persend in
         $persend ) echo $persend >> "temp/persend.txt" && echo 0 >> "temp/every.txt" && read -p "           [+] Do you wish to Generate SMTP ? (y/n) : " yn
    esac
    case $yn in
        [Yy]* ) read -p "           [+] Enter your SMTP Domain ? (example.tld) : " inputname;;
        [Nn]* ) sh "function/run2.sh" && exit;;
    esac
    case $inputname in
         $inputname ) read -p "           [+] How Many user ? : " total;;
    esac
    case $total in
         $total ) echo $total >> "temp/user_total.txt" && echo $inputname >> "temp/domain.txt" && echo "           [+] Generating...." && sleep 1 && cd "function" && php "generate.php" && read -p "           [+] Please Upload generated csv to SMTP admin, Have done ? (y/n) : " haha;;
    esac
    case $haha in
         [Yy]* ) cd "../" &&  sh "function/run2.sh" && exit ;;
         [Nn]* ) exit ;;
    esac
done