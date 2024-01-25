mkdir -p certs

OPENSSL_SUBJ="/C=US/ST=Pennsylvania/L=Conshohocken"
OPENSSL_CA="${OPENSSL_SUBJ}/CN=local"
OPENSSL_SERVER="${OPENSSL_SUBJ}/CN=*.local"
OPENSSL_CLIENT="${OPENSSL_SUBJ}/CN=*.local"

sh ./genroot.sh "${OPENSSL_CA}"
sh ./genserver.sh "${OPENSSL_SERVER}"
sh ./genclient.sh "${OPENSSL_CLIENT}"
