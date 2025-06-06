## Notes Josef

- Kirby-Update: Gemäss [Kirby-YT](https://youtu.be/lLQZd64uvPs?si=-g7lFIqJWn64ZaXe&t=147) kann Update gemacht werden, indem der Ordner `/kirby` ausgetauscht wird, z.B. gegen den aus dem aktuellen [Plain-Kit](https://getkirby.com/try).

## Todo

- ✅ subpages von `/turnier` sollten per .gitignore ausgeschlossen werden (mail adressen)
- ✅ testen: funktioniert language switch auch ab seiten mit abweichenden slug-varianten je nach Sprache?
- ✅ Übersetzung confirmation-mail
- ✅ Auf dem Server: [Mail config](https://getkirby.com/docs/guide/emails#transport-configuration)
- ✅ styling language switch
- ✅ add `_draft` Folders to .gitignore. Zu Turnieren angemeldete Spieler dürfen auf keinen Fall überschrieben werden.
- not so good: change language on success page breaks the internet.
    - might be fixed, needs test
- ftp/github deploy-automatismus

## Deploy

Gemäss Kirby-Dokumentation, [Git-based FTP-deployment](https://getkirby.com/docs/cookbook/development-deployment/git-based-ftp-deployment).

- Push auf GitHub/main löst sofort einen **Deploy auf den Staging-Server** aus.
- Der **Deploy auf Production** wird ausgelöst, wenn ein [*git-Tag*](https://git-scm.com/book/en/v2/Git-Basics-Tagging) auf GitHub gepusht wird.

```
git tag v0.1
git push origin --tags
```

FTP passwords etc. are hidden in GitHub secrets.

## Vermischtes
- gibt es den «zuerigoleu» noch in irgendeinem archiv? (EPS/Vektor?)

## Fragen

- Im Workflow wird die Plattform (Ubuntu) erwähnt, eine arbiträre Annahme. Ist das wichtig/egal?
