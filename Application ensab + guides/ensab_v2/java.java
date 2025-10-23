

public Class Rinfo {

    private String nom;
    private List num;

    public Rinfo(nom){
        this.nom = nom;
        num = new ArrayList();

    }

    public setNum(List num) {
        return this.num =num;

    }

    public int hash(Object o){
        return o.hashCode() % dim;
    }

    public void ajouter (num){
        int i = this.nom.indexof(num);
        if ( i == -1){
            this.nom.add(x)
        }
    }
    public int hashCode(){
        .
        .
        .
        return this.num.hashCode;
    }
}

public Class Repertoire {
    private List[] comp;
    private int dim;

    public Repertoire(int dim){
        this.dim=dim;
        comp = new ArrayList[dim];
        for (int i = 0 ; i<dim ; i++){
            comp[i] = new LinkedList<Rinfo>();


        }

    }

    public void recherche(String nom){
        Rinfo r = new Rinfo(nom);
        int h = hash(r);
        return comp[h].indexof(r);

    }
    public void ajouter(String nom, int num){
        Rinfo rin = new Rinfo(nom);
        int h = hasht(r);
        int i = recherche(nom);

        if(i == -1){
            r.ajouter(nom);
            comp[h].add(r);
        }else{
            ((Rinfo) comp[h].get(i)).ajouter(num);
        }
        //rin.setNum(num);

        
        
    }
}